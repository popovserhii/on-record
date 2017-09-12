<?php

namespace Popov\Student\Form;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use DoctrineModule\Persistence\ProvidesObjectManager;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
//use Agere\Discount\Form\Validator\OneActiveCard;

use Popov\ZfcCore\Service\DomainServiceAwareInterface;
use Popov\ZfcCore\Service\DomainServiceAwareTrait;

class GuardianFieldset extends Fieldset implements InputFilterProviderInterface, DomainServiceAwareInterface, ObjectManagerAwareInterface
{
    use ProvidesObjectManager;

    use DomainServiceAwareTrait;

    public function init()
    {
        $this->setName('guardian');

        $this->add([
            'type' => 'hidden',
            'name' => 'id',
        ]);

        $this->add([
            'name' => 'fullName',
            'options' => [
                'label' => 'Mother/Father Full Name',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter full name...',
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
            'name' => 'profession',
            'options' => [
                'label' => 'Profession',
                'label_attributes' => ['class' => 'col-sm-2 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter profession...',
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
            'fullName' => [
                'required' => false,
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
                'required' => false,
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
                            'message' => 'Phone number must contains 11 numbers',
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