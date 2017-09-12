<?php
namespace Popov\Inquiry\Form;

use Zend\Form\Form;

class InquiryForm extends Form
{
    public function init()
    {
        $this->setName('inquiry');
        $this->setAttributes(['id' => $this->getName() . '-form', 'class' => 'ajax']);

        // Add the project fieldset, and set it as the base fieldset
        $this->add([
            'name' => 'inquiry',
            'type' => InquiryFieldset::class,
            'options' => [
                'use_as_base_fieldset' => true,
            ],
        ]);

        $this->add([
            'name' => 'submit',
            'attributes' => [
                'type' => 'submit',
                'value' => 'Save',
                'class' => 'btn btn-primary',
                //'data-group-id' => 'keys',
            ],
        ]);
    }
}