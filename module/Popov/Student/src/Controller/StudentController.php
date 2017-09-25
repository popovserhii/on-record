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

use Popov\Inquiry\Model\Inquiry;
use Popov\Student\Model\Student;
use Popov\ZfcUser\Model\User;
use Popov\ZfcUser\Service\UserService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Http\Request as HttpRequest;
use Zend\Stdlib\Parameters;
use Zend\View\Model\ViewModel;
use Popov\ZfcRole\Model\Role;
use Popov\Student\Model\Guardian;
use Popov\Student\Service\GuardianService;
use Popov\Student\Form\FirstForm;
use Popov\ZfcEntity\Controller\Plugin\EntityPlugin;

/**
 * @method EntityPlugin entity($context = null)
 */
class StudentController extends AbstractActionController
{
    protected $formElementManager;

    /**
     * @var GuardianService
     */
    protected $studentService;

    public function __construct($formElementManager, $studentService)
    {
        $this->formElementManager = $formElementManager;
        $this->studentService = $studentService;
    }

    public function getStudentService()
    {
        return $this->studentService;
    }

    public function getFormElementManager()
    {
        return $this->formElementManager;
    }

    public function fileAction()
    {
        return new ViewModel();
    }

    public function transmitAction()
    {
        $route = $this->getEvent()->getRouteMatch();
        $params = $route->getParams();
        #$inquiry = ($inquiry = $service->find($id = (int) $route->getParam('id')))
        #    ? $inquiry
        #    : $service->getObjectModel();

        /** @var Inquiry $inquiry */
        $entity = $this->entity(Inquiry::class)->getEntity();
        $inquiry = $this->entity()->find($id = (int) $route->getParam('id'), $entity);
        if (!$inquiry) {
            $this->flashMessenger()->addErrorMessage('Cannot find inquiry form by id: ' . $id);
            return false;
        }

        $user = $this->entity()->getObjectManager()->getRepository(User::class)
            ->findOneBy(['email' => $inquiry->getEmail()]);
        if ($user) {
            $this->flashMessenger()
                ->addErrorMessage(sprintf('Account for student %s was created, earlier', $inquiry->getEmail()));
            return false;
        }

        $role = $this->entity()->getObjectManager()->getRepository(Role::class)->findOneBy(['mnemo' => 'student']);
        /** @var HttpRequest $request */
        $request = $this->getRequest();
        $request->setMethod(HttpRequest::METHOD_POST);
        $request->setPost(new Parameters(['user' => [
            'email' => $inquiry->getEmail(),
            //'password' => substr(md5($inquiry->getEmail() . date('Y-m-d H:i:s')), 0, 8),
            'password' => UserService::generatePassword(),
            'firstName' => $inquiry->getFirstName(),
            'lastName' => $inquiry->getLastName(),
            //'patronymic',
            'phone' => $inquiry->getPhone(),
            //'phoneWork',
            //'phoneInternal',
            'post' => 'Student',
            'birthedAt' => $inquiry->getBirthedAt(),
            //'employedAt',
            //'photo',
            //'notation',
            'roles' => [$role->getId()]
        ]]));

        $params['controller'] = 'user';
        $params['action'] = 'add';

        $userVm = $this->forward()->dispatch('user', ['controller' => 'user', 'action' => 'add']);
        //$userVm = $this->forward()->dispatch($route->getParam('controller'), $params);


        /*$view = (new ViewModel())->setTemplate('tab/switcher');
        !$editVm || $view->addChild($editVm, 'edit');
        !$filesVm || $view->addChild($filesVm, 'files');

        return $view;*/

        $user = $userVm->getVariable('form')->getObject();

        $studentService = $this->getStudentService();
        /** @var Student $student */
        $student = $studentService->getObjectModel();
        $student->setUser($user)
            ->setInquiry($inquiry);

        $studentService->getObjectManager()->flush();

        return $userVm;
    }
}