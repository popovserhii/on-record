<?php
namespace Popov\Hello;

use Zend\EventManager\EventInterface;

class Module
{
    public function onBootstrap(EventInterface $e)
    {
        $eventManager = $e->getTarget()->getEventManager();
        $serviceManager = $e->getApplication()->getServiceManager();
        $eventManager->attach((new Listener\HelloListener())->setServiceLocator($serviceManager));
    }

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
