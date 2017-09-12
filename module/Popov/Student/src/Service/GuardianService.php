<?php
/**
 * First Service
 *
 * @category Popov
 * @package Popov_Hello
 * @author Popov Sergiy <popow.sergiy@gmail.com>
 * @datetime: 21.07.2016 12:57
 */
namespace Popov\Student\Service;

use Zend\Stdlib\Exception;
use Popov\ZfcCore\Service\DomainServiceAbstract;
use Popov\ZfcCore\Service\ConfigAwareInterface;
use Popov\ZfcCore\Service\ConfigAwareTrait;
use Popov\Student\Model\Guardian;

class GuardianService extends DomainServiceAbstract implements ConfigAwareInterface
{
    use ConfigAwareTrait;

    protected $entity = Guardian::class;

    /**
     * Get available payment mnemo methods
     *
     * @return string
     */
    public function getAvailableTypes()
    {
        return $this->getConfig()['person']['types'];
    }
}