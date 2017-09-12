<?php
/**
 * First Service
 *
 * @category Popov
 * @package Popov_Hello
 * @author Popov Sergiy <popow.sergiy@gmail.com>
 * @datetime: 21.07.2016 12:57
 */
namespace Popov\Inquiry\Service;

use Zend\Stdlib\Exception;
use Popov\ZfcCore\Service\DomainServiceAbstract;
use Popov\ZfcCore\Service\ConfigAwareInterface;
use Popov\ZfcCore\Service\ConfigAwareTrait;
use Popov\Inquiry\Model\Inquiry;

class InquiryService extends DomainServiceAbstract implements ConfigAwareInterface
{
    use ConfigAwareTrait;

    protected $entity = Inquiry::class;

    public function getAllowedInquiries()
    {
        $gb = $this->getRepository()->getInquiries();

        return $gb;
    }
}