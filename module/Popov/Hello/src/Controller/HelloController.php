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
namespace Popov\Hello\Controller;

use Popov\Hello\Block\Grid\FirstGrid;
use Popov\Hello\Model\First;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Popov\Hello\Service\FirstService;
use Popov\Hello\Form\FirstForm;
use ZfcDatagrid\Datagrid;

class HelloController extends AbstractActionController
{
    protected $formElementManager;

    /**
     * @var FirstService
     */
    protected $firstService;

    protected $firstGrid;

    public function __construct($formElementManager, $firstService, $firstGrid)
    {
        $this->formElementManager = $formElementManager;
        $this->firstService = $firstService;
        $this->firstGrid = $firstGrid;
    }

    public function getFirstService()
    {
        return $this->firstService;
    }

    public function getFormElementManager()
    {
        return $this->formElementManager;
    }

    /**
     * @return FirstGrid
     */
    public function getFirstGrid()
    {
        static $load;

        if (!$load) {
            $callback = $this->firstGrid;
            $this->firstGrid = $callback();
        }

        return $this->firstGrid;
    }

    public function indexAction() {
        /** @var FirstGrid $firstGrid */
        /** @var Datagrid $firstsDataGrid */
        //$sm = $this->getServiceManager();
        //$sm = $this->getServiceLocator();
        //$om = $this->getInquiryService()->getObjectManager();
        $firstService = $this->getFirstService();
        /** @var FirstService $firstService */
        //$inquiryService = $sm->get('InquiryGrid');;
        /** @var \Zend\Mvc\Router\RouteMatch $route */
        //$route = $this->getEvent()->getRouteMatch();

        //$url = ['controller' => $route->getParam('controller'), 'action' => 'products'];
        $inquiries = $firstService->getAllowedFirsts();

        $firstGrid = $this->getFirstGrid()->build();
        $productDataGrid = $firstGrid->getDataGrid();
        //$productDataGrid->setUrl($this->url()->fromRoute($route->getMatchedRouteName(), $url));
        $productDataGrid->setDataSource($inquiries);
        //$productDataGrid->setDataSource([]);
        $productDataGrid->render();

        return $productDataGrid->getResponse();
    }

    public function firstAction()
    {
        $request = $this->getRequest();
        $route = $this->getEvent()->getRouteMatch();
        $service = $this->getFirstService();
        $fm = $this->getFormElementManager();

        /** @var First $first */
        /*$first = ($first = $service->find($id = (int) $route->getParam('id')))
            ? $first
            : $service->getObjectModel();*/

        $first = $service->getObjectModel();

        /** @var FirstForm $form */
        $form = $fm->get(FirstForm::class);
        $form->bind($first);

        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $first->setCreatedAt(new \DateTime());
                $om = $service->getObjectManager();
                $om->persist($first);
                $om->flush();

                $this->getEventManager()->trigger('first.post', $first);

                $msg = 'Data have been successfully saved';
                $this->flashMessenger()->addSuccessMessage($msg);

                $this->redirect()->toRoute('default', [
                    'controller' => $route->getParam('controller'),
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

    public function againAction()
    {
        //$request = $this->getRequest();
        $route = $this->getEvent()->getRouteMatch();
        $service = $this->getFirstService();

        /** @var First $first */
        $first = ($first = $service->find($id = (int) $route->getParam('id')));

        if ($id) {
            $this->getEventManager()->trigger('first.post', $first);

            $msg = 'Request have been resent';
            $this->flashMessenger()->addSuccessMessage($msg);
        }

        $this->redirect()->toRoute('default', [
            'controller' => $route->getParam('controller'),
            //'action' => 'index',
        ]);
    }
}