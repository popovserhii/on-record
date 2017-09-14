<?php
/**
 * The MIT License (MIT)
 * Copyright (c) 2017 Serhii Popov
 * This source file is subject to The MIT License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/MIT
 *
 * @category Popov
 * @package Popov_Hello
 * @author Serhii Popov <popow.sergiy@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace Popov\Inquiry\Controller;

use Dompdf\Dompdf;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use ZfcDatagrid\Datagrid;
use Popov\ZfcCurrent\Plugin\Current;

use Popov\Inquiry\Service\InquiryService;
use Popov\Inquiry\Form\InquiryForm;
use Popov\Inquiry\Block\Grid\InquiryGrid;
use Popov\Inquiry\Model\Inquiry;

/**
 * Class InquiryController
 * @method Current current($name)
 */
class InquiryController extends AbstractActionController
{
    protected $formElementManager;

    /**
     * @var InquiryService
     */
    protected $inquiryService;

    protected $inquiryGrid;

    /** @var Dompdf */
    protected $domPdf;

    public function __construct($formElementManager, $inquiryService, $inquiryGrid, $domPdf)
    {
        $this->formElementManager = $formElementManager;
        $this->inquiryService = $inquiryService;
        $this->inquiryGrid = $inquiryGrid;
        $this->domPdf = $domPdf;
    }

    public function getInquiryService()
    {
        return $this->inquiryService;
    }

    /**
     * @return InquiryGrid
     */
    public function getInquiryGrid()
    {
        static $load;

        if (!$load) {
            $callback = $this->inquiryGrid;
            $this->inquiryGrid = $callback();
        }

        return $this->inquiryGrid;
    }

    public function getFormElementManager()
    {
        return $this->formElementManager;
    }

    public function getDomPdf()
    {
        return $this->domPdf;
    }

    public function indexAction() {
        /** @var InquiryGrid $inquiryGrid */
        /** @var Datagrid $inquiriesDataGrid */
        /** @var InquiryService $inquiryService */
        $inquiryService = $this->getInquiryService();
        /** @var \Zend\Mvc\Router\RouteMatch $route */
        //$route = $this->getEvent()->getRouteMatch();

        //$url = ['controller' => $route->getParam('controller'), 'action' => 'products'];
        $inquiries = $inquiryService->getAllowedInquiries();

        $inquiryGrid = $this->getInquiryGrid()->build();
        $productDataGrid = $inquiryGrid->getDataGrid();
        //$productDataGrid->setUrl($this->url()->fromRoute($route->getMatchedRouteName(), $url));
        $productDataGrid->setDataSource($inquiries);
        //$productDataGrid->setDataSource([]);
        $productDataGrid->render();

        return $productDataGrid->getResponse();
    }

    public function editAction()
    {
        $request = $this->getRequest();
        $route = $this->getEvent()->getRouteMatch();
        $service = $this->getInquiryService();
        $fm = $this->getFormElementManager();

        /** @var Inquiry $inquiry */
        $inquiry = ($inquiry = $service->find($id = (int) $route->getParam('id')))
            ? $inquiry
            : $service->getObjectModel();

        //$inquiry = $service->getObjectModel();

        /** @var InquiryForm $form */
        $form = $fm->get(InquiryForm::class);
        $form->bind($inquiry);

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $guardian = $inquiry->getGuardian();
                if (!$guardian->getFullName()
                    && !$guardian->getPhone()
                    && !$guardian->getEmail()
                    && !$guardian->getProfession()
                ) {
                    $inquiry->setGuardian(null);
                }

                $inquiry->setCreatedAt(new \DateTime());
                $om = $service->getObjectManager();
                $om->persist($inquiry);
                $om->flush();

                //$this->getEventManager()->trigger('first.post', $first);

                $msg = 'Data have been successfully saved';
                $this->flashMessenger()->addSuccessMessage($msg);

                $this->redirect()->toRoute('default', [
                    'controller' => $route->getParam('controller'),
                    'action' =>  ($route->getParam('action') == 'edit') ? 'index' : 'thanks',
                ]);
            } else {
                $msg = 'Form is invalid. Please, check the correctness of the entered data';
                $this->flashMessenger()->addErrorMessage($msg);
            }
        }

        return (new ViewModel([
            'form' => $form,
        ]));
    }

    public function formAction()
    {
        //$request = $this->getRequest();
        $route = $this->getEvent()->getRouteMatch();

        if ($route->getParam('id')) {
            $this->redirect()->toRoute('default', [
                'controller' => $route->getParam('controller'),
                'action' => $route->getParam('action'),
            ]);
        }

        $viewModel = $this->editAction();

        return $viewModel;
    }

    public function pdfAction()
    {
        $viewModel = $this->editAction()->setTemplate('popov/inquiry/edit');
        $viewRender = $this->current('view');
        $html = $viewRender->render($viewModel);

        $html = str_replace('value=""', 'value="-"', $html);
        $html = mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8');
        $html = <<<HTML
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
      body { font-family: DejaVu Sans, sans-serif; }
    </style>
</head>
<body>{$html}</body>
</html>
HTML;

        // instantiate and use the dompdf class
        $domPdf = $this->getDomPdf();

        $domPdf->loadHtml($html, 'UTF-8');

        // (Optional) Setup the paper size and orientation
        $domPdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $domPdf->render();

        // Output the generated PDF to Browser
        $domPdf->stream('student-' . $this->getEvent()->getRouteMatch()->getParam('id'));

        return false;
    }

    public function thanksAction()
    {
        return new ViewModel();
    }
}