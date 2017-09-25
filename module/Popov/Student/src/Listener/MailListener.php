<?php

namespace Popov\Student\Listener;

use Popov\Student\Model\Student;
use Popov\Student\Service\StudentService;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\ListenerAggregateTrait;
use Zend\EventManager\Event;
use Popov\Student\Controller\StudentController;
use Popov\ZfcUser\Controller\UserController;
use Popov\ZfcMail\Service\MailService;
use Popov\ZfcMail\Model\Mail;
use Popov\ZfcUser\Model\User;

class MailListener implements ListenerAggregateInterface
{
    use ListenerAggregateTrait;
    use ServiceLocatorAwareTrait;

    public function attach(EventManagerInterface $events)
    {
        $sharedEventManager = $events->getSharedManager(); // shared events manager
        $this->listeners[] = $sharedEventManager->attach(UserController::class, 'add.post', function (Event $e) {
            //$config = $sm->get('Config')['sms'];
            $user = $e->getTarget();
            if ($user instanceof User) {
                $sm = $this->getServiceLocator();
                $em = $sm->get('Doctrine\ORM\EntityManager');

                /** @var MailService $mailService */
                $mailService = $sm->get('MailService');

                /** @var Mail $mail */
                $mail = $em->getRepository(Mail::class)->findOneBy(['action' => 'user_add', 'type' => Mail::TYPE_MAIL]);

                $mailService->send($mail, [$user->getEmail()], ['user' => $user, 'password' => $e->getParam('password')]);
            }
        }, 110);
    }
}