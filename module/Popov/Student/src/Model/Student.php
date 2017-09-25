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
 * @package Popov_<package>
 * @author Serhii Popov <popow.sergiy@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace Popov\Student\Model;

use Doctrine\ORM\Mapping as ORM;
use Popov\Inquiry\Model\Inquiry;
use Popov\ZfcCore\Model\DomainAwareTrait;
use Popov\ZfcUser\Model\User;

/**
 * ORM\Entity(repositoryClass="Agere\Discount\Model\Repository\CardRepository")
 * @ORM\Entity()
 * @ORM\Table(name="student")
 */
class Student
{
    use DomainAwareTrait;

    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned":true})
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var User
     * @ORM\OneToOne(targetEntity="Popov\ZfcUser\Model\User")
     * @ORM\JoinColumn(name="userId", referencedColumnName="id")
     */
    private $user;

    /**
     * @var Inquiry
     * @ORM\OneToOne(targetEntity="Popov\Inquiry\Model\Inquiry")
     * @ORM\JoinColumn(name="inquiryId", referencedColumnName="id")
     */
    private $inquiry;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     * @return Student
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Inquiry
     */
    public function getInquiry()
    {
        return $this->inquiry;
    }

    /**
     * @param Inquiry $inquiry
     * @return Student
     */
    public function setInquiry($inquiry)
    {
        $this->inquiry = $inquiry;

        return $this;
    }
}
