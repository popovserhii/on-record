<?php

namespace Popov\Hello\Form;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use DoctrineModule\Persistence\ProvidesObjectManager;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
//use Agere\Discount\Form\Validator\OneActiveCard;

use Popov\ZfcCore\Service\DomainServiceAwareInterface;
use Popov\ZfcCore\Service\DomainServiceAwareTrait;

class FirstFieldset extends Fieldset implements InputFilterProviderInterface, DomainServiceAwareInterface, ObjectManagerAwareInterface
{
    use ProvidesObjectManager;

    use DomainServiceAwareTrait;

    public function init()
    {
        $this->setName('first');

        $this->add([
            'type' => 'hidden',
            'name' => 'id',
        ]);

        $this->add([
            'type' => 'select',
            'name' => 'type',
            'options' => [
                'label' => 'Who Calls you?',
                'label_attributes' => ['class' => 'col-sm-1 control-label'],
                'value_options' => $this->getDomainService()->getAvailableTypes(),

            ],
            'attributes' => [
                //'value' => '1' //set selected to '1'
                'class' => 'form-control',
            ],
        ]);

        $this->add([
            'name' => 'fullName',
            'options' => [
                'label' => 'Full Name',
                'label_attributes' => ['class' => 'col-sm-1 control-label'],
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
                'label_attributes' => ['class' => 'col-sm-1 control-label'],
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
                'label_attributes' => ['class' => 'col-sm-1 control-label'],
            ],
            'attributes' => [
                'class' => 'form-control',
                'placeholder' => 'Enter e-mail...',
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
            'type' => [
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
            'fullName' => [
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