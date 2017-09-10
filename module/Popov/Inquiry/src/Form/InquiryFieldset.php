<?php

namespace Popov\Inquiry\Form;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use DoctrineModule\Persistence\ProvidesObjectManager;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
//use Agere\Discount\Form\Validator\OneActiveCard;

use Popov\ZfcCore\Service\DomainServiceAwareInterface;
use Popov\ZfcCore\Service\DomainServiceAwareTrait;
use Popov\Student\Form\GuardianFieldset;

class InquiryFieldset extends Fieldset implements InputFilterProviderInterface, DomainServiceAwareInterface, ObjectManagerAwareInterface
{
    use ProvidesObjectManager;

    use DomainServiceAwareTrait;

    public function init()
    {
        $this->setName('inquiry');

        $this->add([
            'name' => 'guardian',
            'type' => GuardianFieldset::class,
        ]);

        $this->add([
            'type' => 'hidden',
            'name' => 'id',
        ]);

        $this->add([
            'name' => 'firstName',
            'options' => [
                'label' => 'First Name',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter first name...',
            ],
        ]);

        $this->add([
            'name' => 'lastName',
            'options' => [
                'label' => 'Last Name',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter last name...',
            ],
        ]);

        $this->add([
            'name' => 'gender',
            'options' => [
                'label' => 'Gender',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter gender name...',
            ],
        ]);

        $this->add([
            'name' => 'maritalStatus',
            'options' => [
                'label' => 'Marital Status',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter your marital status...',
            ],
        ]);

        $this->add([
            'name' => 'idCard',
            'options' => [
                'label' => 'ID',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter ID...',
            ],
        ]);

        $this->add([
            'name' => 'passportCode',
            'options' => [
                'label' => 'Passport Code',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter passport code...',
            ],
        ]);

        $this->add([
            'name' => 'passportNumber',
            'options' => [
                'label' => 'Passport Number',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter passport number...',
            ],
        ]);

        $this->add([
            'name' => 'passportIssued',
            'options' => [
                'label' => 'Passport Issued',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter passport number...',
            ],
        ]);

        $this->add([
            //'type' => 'datetime',
            'name' => 'birthedAt',
            'options' => [
                'label' => 'Date of Birth',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
                'format' => 'd/m/Y',
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Date format: 12/06/1990',
            ],
        ]);

        $this->add([
            'name' => 'birthedIn',
            'options' => [
                'label' => 'Place of Birth',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter place of birth...',
            ],
        ]);

        $this->add([
            'name' => 'nationality',
            'options' => [
                'label' => 'Nationality',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter nationality...',
            ],
        ]);

        $this->add([
            'name' => 'phone',
            'options' => [
                'label' => 'Mobile Number',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Number format: +357 9X XXX XXX',
            ],
        ]);

        $this->add([
            'name' => 'email',
            'options' => [
                'label' => 'E-mail',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter e-mail...',
            ],
        ]);

        $this->add([
            'name' => 'street',
            'options' => [
                'label' => 'Street',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter street...',
            ],
        ]);

        $this->add([
            'name' => 'city',
            'options' => [
                'label' => 'City/Village',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter city/village...',
            ],
        ]);

        $this->add([
            'name' => 'municipality',
            'options' => [
                'label' => 'Municipality',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter municipality...',
            ],
        ]);

        $this->add([
            'name' => 'postCode',
            'options' => [
                'label' => 'Post Code',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter post code...',
            ],
        ]);

        $this->add([
            'name' => 'secondaryEducation',
            'options' => [
                'label' => 'Secondary Education',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter secondary education...',
            ],
        ]);

        $this->add([
            'name' => 'secondarySchoolName',
            'options' => [
                'label' => 'Secondary School Name',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter secondary school name...',
            ],
        ]);

        $this->add([
            'name' => 'typeOfEducation',
            'options' => [
                'label' => 'Type of Education',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter type of Education...',
            ],
        ]);

        $this->add([
            'name' => 'secondaryYearOfGraduation',
            'options' => [
                'label' => 'Year of Graduation',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter year of graduation...',
            ],
        ]);

        $this->add([
            'name' => 'schoolAddress',
            'options' => [
                'label' => 'School Address',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter school address...',
            ],
        ]);

        $this->add([
            'name' => 'schoolWebsite',
            'options' => [
                'label' => 'School Website',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter school website...',
            ],
        ]);

        $this->add([
            'name' => 'universityName',
            'options' => [
                'label' => 'University Name',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter university name...',
            ],
        ]);

        $this->add([
            'name' => 'levelOfStudy',
            'options' => [
                'label' => 'Level of Study',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter level of study...',
            ],
        ]);

        $this->add([
            'name' => 'programmeOfStudy',
            'options' => [
                'label' => 'Programme Of Study',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter programme of study...',
            ],
        ]);

        $this->add([
            'name' => 'tertiaryYearOfGraduation',
            'options' => [
                'label' => 'Year of Graduation',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter year of graduation...',
            ],
        ]);

        $this->add([
            'name' => 'honorsAndDistinctions',
            'options' => [
                'label' => 'Honors and Distinctions',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter honors and distinctions...',
            ],
        ]);

        $this->add([
            'name' => 'schoolActivities',
            'options' => [
                'label' => 'School Activities',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter school activities...',
            ],
        ]);

        $this->add([
            'name' => 'communityService',
            'options' => [
                'label' => 'Community Service',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter community service...',
            ],
        ]);

        $this->add([
            'name' => 'otherActivities',
            'options' => [
                'label' => 'Other Interests & Activities',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter interests & activities...',
            ],
        ]);

        $this->add([
            'name' => 'employment',
            'options' => [
                'label' => 'Employment (Practical experience)',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter experience...',
            ],
        ]);

        $this->add([
            'name' => 'academicAreasOfInterest',
            'options' => [
                'label' => 'Academic Areas of Interest',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter interest...',
            ],
        ]);

        $this->add([
            'name' => 'countriesInterestedForStudies',
            'options' => [
                'label' => 'Countries Interested for Studies',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter countries...',
            ],
        ]);

        $this->add([
            'name' => 'comment',
            'options' => [
                'label' => 'Comments & Questions',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter comments...',
            ],
        ]);
    }

    /**
     * Should return an array specification compatible with
     * {@link Zend\InputFilter\Factory::createInputFilter()}.
     *
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return [
            'id' => [
                'required' => false,
            ],
            'birthedAt' => [
                'required' => false,
                'validators' => [
                    [
                        'name' => 'Date',
                        'options' => [
                            'format' => 'd/m/Y',
                        ],
                    ],
                ],
            ],
            'firstName' => [
                'required' => true,
                'validators' => [
                    [
                        'name' => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min' => 3,
                        ],
                    ],
                ],
            ],
            'phone' => [
                'required' => true,
                'filters' => [
                    ['name' => 'StringTrim'],
                    [
                        'name' => 'PregReplace',
                        'options' => [
                            'pattern' => '/[^0-9]/',
                            'replacement' => '',
                        ],
                    ],
                ],
                'validators' => [
                    [
                        'name' => 'StringLength',
                        'options' => [
                            'encoding' => 'UTF-8',
                            'min' => 11,
                            'max' => 11,
                            'message' => 'Phone number must contains 13 numbers',
                        ],
                    ],
                    [
                        'name' => 'Digits',
                    ],
                ],
            ],
            'email' => [
                'required' => false,
                'validators' => [
                    [
                        'name' => 'EmailAddress',
                        'options' => [
                            'message' => 'Invalid email address',
                        ],
                    ],
                ],
            ],
        ];
    }
}