<?php

namespace Popov\Inquiry\Block\Grid;

use DoctrineModule\Persistence\ProvidesObjectManager;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Zend\Stdlib\Exception\RuntimeException;
use ZfcDatagrid\Column;
use ZfcDatagrid\Column\Style;
use ZfcDatagrid\Column\Type;
use Agere\ZfcDataGrid\Block\AbstractGrid;

class InquiryGrid extends AbstractGrid implements ObjectManagerAwareInterface
{
    use ProvidesObjectManager;

    protected $createButtonTitle = '';

    protected $backButtonTitle = '';

    public function build()
    {
        $grid = $this->getDataGrid();

        $grid->setId('inquiry');
        $grid->setTitle('Inquiry');
        #$grid->setRendererName('jqGrid');

        $rendererOptions = $grid->getToolbarTemplateVariables();

        $rendererOptions['gridFooterRow'] = true;
        $rendererOptions['navGridDel'] = true;
        //$rendererOptions['navGridSearch'] = true;
        //$rendererOptions['inlineNavEdit'] = true;
        //$rendererOptions['inlineNavAdd'] = true;
        $rendererOptions['inlineNavCancel'] = true;
        $rendererOptions['navGridRefresh'] = true;

        $grid->setToolbarTemplateVariables($rendererOptions);

        $colId = $this->add([
            'name' => 'Select',
            'construct' => ['id', 'inquiry'],
            'identity' => true,
        ])->getDataGrid()->getColumnByUniqueId('inquiry_id');

        $this->add([
            'name' => 'Select',
            'construct' => ['firstName', 'inquiry'],
            'label' => 'First Name',
            'width' => 2,
        ]);

        $this->add([
            'name' => 'Select',
            'construct' => ['lastName', 'inquiry'],
            'label' => 'Last Name',
            'width' => 2,
        ]);

        $this->add([
            'name' => 'Select',
            'construct' => ['createdAt', 'inquiry'],
            'label' => 'Date create',
            'translation_enabled' => true,
            'width' => 2,
            'type' => ['name' => 'DateTime'],
        ]);

        $this->add([
            'name' => 'Select',
            'construct' => ['phone', 'inquiry'],
            'label' => 'Mobile number',
            'translation_enabled' => true,
            'width' => 2,
        ]);

        $this->add([
            'name' => 'Select',
            'construct' => ['email', 'inquiry'],
            'label' => 'E-mail',
            'translation_enabled' => true,
            'width' => 2,
        ]);

        $this->add([
            'name' => 'Action',
            'construct' => ['edit'],
            'label' => ' ',
            'width' => 1,
            'styles' => [[
                'name' => 'BackgroundColor',
                'construct' => [[224, 226, 229]],
            ]],
            'formatters' => [[
                'name' => 'Link',
                'attributes' => ['class' => 'pencil-edit-icon', 'target' => '_blank'],
                'link' => ['href' => '/inquiry/edit', 'placeholder_column' => $colId]
            ]],
        ]);

        return $this;
    }
}