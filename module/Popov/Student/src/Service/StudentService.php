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
use Popov\Student\Model\Student;

class StudentService extends DomainServiceAbstract
{
    protected $entity = Student::class;
}