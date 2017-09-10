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
 * @package Popov_Inquiry
 * @author Serhii Popov <popow.sergiy@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License (MIT)
 */
namespace Popov\Inquiry\Model;

use Doctrine\ORM\Mapping as ORM;
use Popov\ZfcCore\Model\DomainAwareTrait;
use Popov\Student\Model\Guardian;

/**
 * @ORM\Entity(repositoryClass="Popov\Inquiry\Model\Repository\InquiryRepository")
 * @ORM\Table(name="inquiry")
 */
class Inquiry
{
    use DomainAwareTrait;

    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned":true})
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \DateTime
     * @ORM\Column(name="createdAt", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var string
     * @ORM\Column(name="firstName", type="string", nullable=false)
     */
    private $firstName;

    /**
     * @var string
     * @ORM\Column(name="lastName", type="string", nullable=true, options={"default":""})
     */
    private $lastName;

    /**
     * @var string
     * @ORM\Column(name="gender", type="string", nullable=true, options={"default":""})
     */
    private $gender;

    /**
     * @var string
     * @ORM\Column(name="maritalStatus", type="string", nullable=true, options={"default":""})
     */
    private $maritalStatus;

    /**
     * @var int
     * @ORM\Column(name="idCard", type="integer", nullable=true)
     */
    private $idCard;

    /**
     * @var string
     * @ORM\Column(name="passportCode", type="string", nullable=true)
     */
    private $passportCode;

    /**
     * @var int
     * @ORM\Column(name="passportNumber", type="integer", nullable=true)
     */
    private $passportNumber;

    /**
     * @var string
     * @ORM\Column(name="passportIssued", type="string", nullable=true, options={"default":""})
     */
    private $passportIssued;

    /**
     * @var \DateTime
     * @ORM\Column(name="birthedAt", type="datetime", nullable=true)
     */
    private $birthedAt;

    /**
     * @var string
     * @ORM\Column(name="birthedIn", type="string", nullable=true, options={"default":""})
     */
    private $birthedIn;

    /**
     * @var string
     * @ORM\Column(name="nationality", type="string", nullable=true, options={"default":""})
     */
    private $nationality;

    /**
     * @var int
     * @ORM\Column(name="phone", type="string", length=11, nullable=false)
     */
    private $phone;

    /**
     * @var string
     * @ORM\Column(name="email", type="string", nullable=true)
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(name="street", type="string", nullable=true, options={"default":""})
     */
    private $street;

    /**
     * @var string
     * @ORM\Column(name="city", type="string", nullable=true, options={"default":""})
     */
    private $city;

    /**
     * @var string
     * @ORM\Column(name="municipality", type="string", nullable=true, options={"default":""})
     */
    private $municipality;

    /**
     * @var string
     * @ORM\Column(name="postCode", type="string", nullable=true, options={"default":""})
     */
    private $postCode;

    /**
     * @var string
     * @ORM\Column(name="secondaryEducation", type="string", nullable=true, options={"default":""})
     */
    private $secondaryEducation;

    /**
     * @var string
     * @ORM\Column(name="secondarySchoolName", type="string", nullable=true, options={"default":""})
     */
    private $secondarySchoolName;

    /**
     * @var string
     * @ORM\Column(name="typeOfEducation", type="string", nullable=true, options={"default":""})
     */
    private $typeOfEducation;

    /**
     * @var string
     * @ORM\Column(name="secondaryYearOfGraduation", type="string", nullable=true, options={"default":""})
     */
    private $secondaryYearOfGraduation;

    /**
     * @var string
     * @ORM\Column(name="schoolAddress", type="string", nullable=true, options={"default":""})
     */
    private $schoolAddress;

    /**
     * @var string
     * @ORM\Column(name="schoolWebsite", type="string", nullable=true, options={"default":""})
     */
    private $schoolWebsite;

    /**
     * @var string
     * @ORM\Column(name="tertiaryEducation", type="string", nullable=true, options={"default":""})
     */
    private $tertiaryEducation;

    /**
     * @var string
     * @ORM\Column(name="universityName", type="string", nullable=true, options={"default":""})
     */
    private $universityName;

    /**
     * @var string
     * @ORM\Column(name="levelOfStudy", type="string", nullable=true, options={"default":""})
     */
    private $levelOfStudy;

    /**
     * @var string
     * @ORM\Column(name="programmeOfStudy", type="string", nullable=true, options={"default":""})
     */
    private $programmeOfStudy;

    /**
     * @var string
     * @ORM\Column(name="tertiaryYearOfGraduation", type="string", nullable=true, options={"default":""})
     */
    //private $tertiaryYearOfGraduation;

    /**
     * @var string
     * @ORM\Column(name="honorsAndDistinctions", type="string", nullable=true, options={"default":""})
     */
    private $honorsAndDistinctions;

    /**
     * @var string
     * @ORM\Column(name="schoolActivities", type="string", nullable=true, options={"default":""})
     */
    private $schoolActivities;

    /**
     * @var string
     * @ORM\Column(name="communityService", type="string", nullable=true, options={"default":""})
     */
    private $communityService;

    /**
     * @var string
     * @ORM\Column(name="otherActivities", type="string", nullable=true, options={"default":""})
     */
    private $otherActivities;

    /**
     * @var string
     * @ORM\Column(name="employment", type="string", nullable=true, options={"default":""})
     */
    private $employment;

    /**
     * @var string
     * @ORM\Column(name="academicAreasOfInterest", type="string", nullable=true, options={"default":""})
     */
    private $academicAreasOfInterest;

    /**
     * @var string
     * @ORM\Column(name="countriesInterestedForStudies", type="string", nullable=true, options={"default":""})
     */
    private $countriesInterestedForStudies;

    /**
     * @var string
     * @ORM\Column(name="comment", type="string", nullable=true, options={"default":""})
     */
    private $comment;

    /**
     * @var Guardian
     * @ORM\OneToOne(targetEntity="Popov\Student\Model\Guardian", cascade={"all"})
     * @ORM\JoinColumn(name="guardianId", referencedColumnName="id", nullable=true)
     */
    private $guardian;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Inquiry
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return Inquiry
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return Inquiry
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return Inquiry
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     * @return Inquiry
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @return string
     */
    public function getMaritalStatus()
    {
        return $this->maritalStatus;
    }

    /**
     * @param string $maritalStatus
     * @return Inquiry
     */
    public function setMaritalStatus($maritalStatus)
    {
        $this->maritalStatus = $maritalStatus;

        return $this;
    }

    /**
     * @return int
     */
    public function getIdCard()
    {
        return $this->idCard;
    }

    /**
     * @param int $idCard
     * @return Inquiry
     */
    public function setIdCard($idCard)
    {
        $this->idCard = $idCard;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassportCode()
    {
        return $this->passportCode;
    }

    /**
     * @param string $passportCode
     * @return Inquiry
     */
    public function setPassportCode($passportCode)
    {
        $this->passportCode = $passportCode;

        return $this;
    }

    /**
     * @return int
     */
    public function getPassportNumber()
    {
        return $this->passportNumber;
    }

    /**
     * @param int $passportNumber
     * @return Inquiry
     */
    public function setPassportNumber($passportNumber)
    {
        $this->passportNumber = $passportNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getPassportIssued()
    {
        return $this->passportIssued;
    }

    /**
     * @param string $passportIssued
     * @return Inquiry
     */
    public function setPassportIssued($passportIssued)
    {
        $this->passportIssued = $passportIssued;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getBirthedAt()
    {
        return $this->birthedAt;
    }

    /**
     * @param \DateTime $birthedAt
     * @return Inquiry
     */
    public function setBirthedAt($birthedAt)
    {
        $this->birthedAt = $birthedAt;

        return $this;
    }

    /**
     * @return string
     */
    public function getBirthedIn()
    {
        return $this->birthedIn;
    }

    /**
     * @param string $birthedIn
     * @return Inquiry
     */
    public function setBirthedIn($birthedIn)
    {
        $this->birthedIn = $birthedIn;

        return $this;
    }

    /**
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param string $nationality
     * @return Inquiry
     */
    public function setNationality($nationality)
    {
        $this->nationality = $nationality;

        return $this;
    }

    /**
     * @return int
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param int $phone
     * @return Inquiry
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Inquiry
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return Inquiry
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Inquiry
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getMunicipality()
    {
        return $this->municipality;
    }

    /**
     * @param string $municipality
     * @return Inquiry
     */
    public function setMunicipality($municipality)
    {
        $this->municipality = $municipality;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * @param string $postCode
     * @return Inquiry
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getSecondaryEducation()
    {
        return $this->secondaryEducation;
    }

    /**
     * @param string $secondaryEducation
     * @return Inquiry
     */
    public function setSecondaryEducation($secondaryEducation)
    {
        $this->secondaryEducation = $secondaryEducation;

        return $this;
    }

    /**
     * @return string
     */
    public function getSecondarySchoolName()
    {
        return $this->secondarySchoolName;
    }

    /**
     * @param string $secondarySchoolName
     * @return Inquiry
     */
    public function setSecondarySchoolName($secondarySchoolName)
    {
        $this->secondarySchoolName = $secondarySchoolName;

        return $this;
    }

    /**
     * @return string
     */
    public function getTypeOfEducation()
    {
        return $this->typeOfEducation;
    }

    /**
     * @param string $typeOfEducation
     * @return Inquiry
     */
    public function setTypeOfEducation($typeOfEducation)
    {
        $this->typeOfEducation = $typeOfEducation;

        return $this;
    }

    /**
     * @return string
     */
    public function getSecondaryYearOfGraduation()
    {
        return $this->secondaryYearOfGraduation;
    }

    /**
     * @param string $secondaryYearOfGraduation
     * @return Inquiry
     */
    public function setSecondaryYearOfGraduation($secondaryYearOfGraduation)
    {
        $this->secondaryYearOfGraduation = $secondaryYearOfGraduation;

        return $this;
    }

    /**
     * @return string
     */
    public function getSchoolAddress()
    {
        return $this->schoolAddress;
    }

    /**
     * @param string $schoolAddress
     * @return Inquiry
     */
    public function setSchoolAddress($schoolAddress)
    {
        $this->schoolAddress = $schoolAddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getSchoolWebsite()
    {
        return $this->schoolWebsite;
    }

    /**
     * @param string $schoolWebsite
     * @return Inquiry
     */
    public function setSchoolWebsite($schoolWebsite)
    {
        $this->schoolWebsite = $schoolWebsite;

        return $this;
    }

    /**
     * @return string
     */
    public function getTertiaryEducation()
    {
        return $this->tertiaryEducation;
    }

    /**
     * @param string $tertiaryEducation
     * @return Inquiry
     */
    public function setTertiaryEducation($tertiaryEducation)
    {
        $this->tertiaryEducation = $tertiaryEducation;

        return $this;
    }

    /**
     * @return string
     */
    public function getUniversityName()
    {
        return $this->universityName;
    }

    /**
     * @param string $universityName
     * @return Inquiry
     */
    public function setUniversityName($universityName)
    {
        $this->universityName = $universityName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLevelOfStudy()
    {
        return $this->levelOfStudy;
    }

    /**
     * @param string $levelOfStudy
     * @return Inquiry
     */
    public function setLevelOfStudy($levelOfStudy)
    {
        $this->levelOfStudy = $levelOfStudy;

        return $this;
    }

    /**
     * @return string
     */
    public function getProgrammeOfStudy()
    {
        return $this->programmeOfStudy;
    }

    /**
     * @param string $programmeOfStudy
     * @return Inquiry
     */
    public function setProgrammeOfStudy($programmeOfStudy)
    {
        $this->programmeOfStudy = $programmeOfStudy;

        return $this;
    }

    /**
     * @return string
     */
    public function getHonorsAndDistinctions()
    {
        return $this->honorsAndDistinctions;
    }

    /**
     * @param string $honorsAndDistinctions
     * @return Inquiry
     */
    public function setHonorsAndDistinctions($honorsAndDistinctions)
    {
        $this->honorsAndDistinctions = $honorsAndDistinctions;

        return $this;
    }

    /**
     * @return string
     */
    public function getSchoolActivities()
    {
        return $this->schoolActivities;
    }

    /**
     * @param string $schoolActivities
     * @return Inquiry
     */
    public function setSchoolActivities($schoolActivities)
    {
        $this->schoolActivities = $schoolActivities;

        return $this;
    }

    /**
     * @return string
     */
    public function getCommunityService()
    {
        return $this->communityService;
    }

    /**
     * @param string $communityService
     * @return Inquiry
     */
    public function setCommunityService($communityService)
    {
        $this->communityService = $communityService;

        return $this;
    }

    /**
     * @return string
     */
    public function getOtherActivities()
    {
        return $this->otherActivities;
    }

    /**
     * @param string $otherActivities
     * @return Inquiry
     */
    public function setOtherActivities($otherActivities)
    {
        $this->otherActivities = $otherActivities;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmployment()
    {
        return $this->employment;
    }

    /**
     * @param string $employment
     * @return Inquiry
     */
    public function setEmployment($employment)
    {
        $this->employment = $employment;

        return $this;
    }

    /**
     * @return string
     */
    public function getAcademicAreasOfInterest()
    {
        return $this->academicAreasOfInterest;
    }

    /**
     * @param string $academicAreasOfInterest
     * @return Inquiry
     */
    public function setAcademicAreasOfInterest($academicAreasOfInterest)
    {
        $this->academicAreasOfInterest = $academicAreasOfInterest;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountriesInterestedForStudies()
    {
        return $this->countriesInterestedForStudies;
    }

    /**
     * @param string $countriesInterestedForStudies
     * @return Inquiry
     */
    public function setCountriesInterestedForStudies($countriesInterestedForStudies)
    {
        $this->countriesInterestedForStudies = $countriesInterestedForStudies;

        return $this;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return Inquiry
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @return Guardian
     */
    public function getGuardian()
    {
        return $this->guardian;
    }

    /**
     * @param Guardian $guardian
     * @return Inquiry
     */
    public function setGuardian($guardian)
    {
        $this->guardian = $guardian;

        return $this;
    }
}
