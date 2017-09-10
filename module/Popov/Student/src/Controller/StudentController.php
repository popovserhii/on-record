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
namespace Popov\Student\Controller;

use Popov\Student\Model\Guardian;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Popov\Student\Service\GuardianService;
use Popov\Student\Form\FirstForm;

class StudentController extends AbstractActionController
{
    protected $formElementManager;

    /**
     * @var GuardianService
     */
    protected $firstService;

    public function __construct($formElementManager, $firstService)
    {
        $this->formElementManager = $formElementManager;
        $this->firstService = $firstService;
    }

    public function getFirstService()
    {
        return $this->firstService;
    }

    public function getFormElementManager()
    {
        return $this->formElementManager;
    }

    public function firstAction()
    {
        $request = $this->getRequest();
        //$route = $this->getEvent()->getRouteMatch();
        $service = $this->getFirstService();
        $fm = $this->getFormElementManager();

        /** @var Guardian $first */
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
            } else {
                $msg = 'Form is invalid. Please, check the correctness of the entered data';
                $this->flashMessenger()->addErrorMessage($msg);
            }
        }

        return (new ViewModel([
            'form' => $form,
        ]));
    }
}