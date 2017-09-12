<?php
/**
 * Created by PhpStorm.
 * User: Vlad Kozak
 * Date: 28.03.16
 * Time: 20:02
 */
namespace Popov\Hello\Listener;

use DateTime;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\ListenerAggregateTrait;
use Zend\EventManager\Event;
use Popov\Hello\Controller\HelloController;
use Popov\Hello\Model\First;
//use Twilio\Rest\Client;
use Popov\Cyta\Client;

class HelloListener implements ListenerAggregateInterface
{
    use ListenerAggregateTrait;
    use ServiceLocatorAwareTrait;

    public function attach(EventManagerInterface $events)
    {
        $sharedEventManager = $events->getSharedManager(); // shared events manager
        $this->listeners[] = $sharedEventManager->attach(HelloController::class, 'first.post', function (Event $e) {
            $sm = $this->getServiceLocator();
            $item = $e->getTarget();
            if ($item instanceof First) {
                $config = $sm->get('Config')['sms'];

                $request = $sm->get('Request');
                $serverUrl = $request ->getUri()->getScheme() . '://' . $request ->getUri()->getHost();

                $client = new Client($config['options']['username'], $config['options']['secret_key']);
                $message = sprintf('Hey, thank you for your call. Please fill the form %s/inquiry/form', $serverUrl);

                $client->send(
                    substr($item->getPhone(), 3),
                    $message
                );

            }
        }, 110);
    }
}