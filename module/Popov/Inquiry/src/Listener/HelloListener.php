<?php
/**
 * Created by PhpStorm.
 * User: Vlad Kozak
 * Date: 28.03.16
 * Time: 20:02
 */
namespace Popov\Inquiry\Listener;

use DateTime;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\ListenerAggregateTrait;
use Zend\EventManager\Event;
use Popov\Inquiry\Controller\InquiryController;
use Popov\Inquiry\Model\Inquiry;
use Twilio\Rest\Client;

class HelloListener implements ListenerAggregateInterface
{
    use ListenerAggregateTrait;
    use ServiceLocatorAwareTrait;

    public function attach(EventManagerInterface $events)
    {
        $sharedEventManager = $events->getSharedManager(); // shared events manager
        $this->listeners[] = $sharedEventManager->attach(InquiryController::class, 'first.post', function (Event $e) {
            $sm = $this->getServiceLocator();
            $config = $sm->get('Config')['sms'];
            $item = $e->getTarget();
            if ($item instanceof Inquiry) {

                // test
                //$AccountSid = "AC86486300d8e991d6102e9c5b463f1347";
                //$AuthToken = "37fea6b08324112395cdcda721bbe7ef";

                // original
                //$AccountSid = "AC7d1a91a8a4736dcdb183135b97424db5";
                //$AuthToken = "fa7f5b7538ffb89823230646d4c78f82";
                // Step 3: instantiate a new Twilio Rest Client
                $client = new Client($config['options']['account_sid'], $config['options']['auth_token']);
                $sms = $client->account->messages->create(
                // the number we are sending to - Any phone number
                    '+' . $item->getPhone(),
                    [
                        // Step 6: Change the 'From' number below to be a valid Twilio number
                        // that you've purchased
                        //'from' => "+35799927725",
                        'from' => $config['from'],
                        // the sms body
                        'body' => 'Go to the link and full fill the form!',
                        // Step 7: Add url(s) to the image media you want to send
                        //'mediaUrl' => array("https://demo.twilio.com/owl.png",
                        //    "https://demo.twilio.com/logo.png")
                    ]
                );
            }
        }, 110);
    }
}