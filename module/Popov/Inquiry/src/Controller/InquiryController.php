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

use Popov\Inquiry\Block\Grid\InquiryGrid;
use Popov\Inquiry\Model\Inquiry;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Popov\Inquiry\Service\InquiryService;
use Popov\Inquiry\Form\InquiryForm;
use ZfcDatagrid\Datagrid;

class InquiryController extends AbstractActionController
{
    protected $formElementManager;

    /**
     * @var InquiryService
     */
    protected $inquiryService;

    protected $inquiryGrid;

    public function __construct($formElementManager, $inquiryService, $inquiryGrid)
    {
        $this->formElementManager = $formElementManager;
        $this->inquiryService = $inquiryService;
        $this->inquiryGrid = $inquiryGrid;
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

    public function indexAction() {
        /** @var InquiryGrid $inquiryGrid */
        /** @var Datagrid $inquiriesDataGrid */
        //$sm = $this->getServiceManager();
        //$sm = $this->getServiceLocator();
        //$om = $this->getInquiryService()->getObjectManager();
        $inquiryService = $this->getInquiryService();
        /** @var InquiryService $inquiryService */
        //$inquiryService = $sm->get('InquiryGrid');;
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

    public function thanksAction()
    {
        return new ViewModel();
    }
}