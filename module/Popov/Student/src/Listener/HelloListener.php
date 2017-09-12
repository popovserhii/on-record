<?php
/**
 * Created by PhpStorm.
 * User: Vlad Kozak
 * Date: 28.03.16
 * Time: 20:02
 */
namespace Popov\Student\Listener;

use DateTime;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\ListenerAggregateTrait;
use Zend\EventManager\Event;
use Popov\Student\Controller\StudentController;
use Popov\Student\Model\Guardian;
//use Twilio\Rest\Client;
use Popov\Cyta\Client;

class HelloListener implements ListenerAggregateInterface
{
    use ListenerAggregateTrait;
    use ServiceLocatorAwareTrait;

    public function attach(EventManagerInterface $events)
    {
        $sharedEventManager = $events->getSharedManager(); // shared events manager
        $this->listeners[] = $sharedEventManager->attach(StudentController::class, 'first.post', function (Event $e) {
            $sm = $this->getServiceLocator();
            $config = $sm->get('Config')['sms'];
            $item = $e->getTarget();
            if ($item instanceof Guardian) {
                $client = new Client($config['options']['username'], $config['options']['secret_key']);

                $client->send(
                    substr($item->getPhone(), 3),
                    'Hey, thank you for your call. Please fill the form www.example.com/form'
                );

            }
        }, 110);
    }
}