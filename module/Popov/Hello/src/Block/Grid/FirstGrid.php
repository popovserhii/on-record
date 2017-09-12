<?php

namespace Popov\Hello\Block\Grid;

use DoctrineModule\Persistence\ProvidesObjectManager;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Zend\Stdlib\Exception\RuntimeException;
use ZfcDatagrid\Column;
use ZfcDatagrid\Column\Style;
use ZfcDatagrid\Column\Type;
use Agere\ZfcDataGrid\Block\AbstractGrid;

class FirstGrid extends AbstractGrid implements ObjectManagerAwareInterface
{
    use ProvidesObjectManager;

    protected $createButtonTitle = '';

    protected $backButtonTitle = '';

    public function build()
    {
        $grid = $this->getDataGrid();

        $rendererOptions = $grid->getToolbarTemplateVariables();

        $rendererOptions['gridFooterRow'] = true;
        $rendererOptions['navGridDel'] = true;
        //$rendererOptions['navGridSearch'] = true;
        //$rendererOptions['inlineNavEdit'] = true;
        //$rendererOptions['inlineNavAdd'] = true;
        $rendererOptions['inlineNavCancel'] = true;
        $rendererOptions['navGridRefresh'] = true;

        $grid->setToolbarTemplateVariables($rendererOptions);

        $grid->setId('first');
        $grid->setTitle('First');
        #$grid->setRendererName('jqGrid');

        $colId = $this->add([
            'name' => 'Select',
            'construct' => ['id', 'first'],
            'identity' => true,
        ])->getDataGrid()->getColumnByUniqueId('first_id');

        $this->add([
            'name' => 'Select',
            'construct' => ['fullName', 'first'],
            'label' => 'Full Name',
            'width' => 2,
        ]);

        $this->add([
            'name' => 'Select',
            'construct' => ['createdAt', 'first'],
            'label' => 'Date create',
            'translation_enabled' => true,
            'width' => 2,
            'type' => ['name' => 'DateTime'],
        ]);

        $this->add([
            'name' => 'Select',
            'construct' => ['phone', 'first'],
            'label' => 'Mobile number',
            'translation_enabled' => true,
            'width' => 2,
        ]);

        $this->add([
            'name' => 'Select',
            'construct' => ['email', 'first'],
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
            'formatters' => [
                [
                    'name' => 'Link',
                    'attributes' => ['class' => 'pencil-edit-icon', 'target' => '_blank'],
                    'link' => ['href' => '/hello/edit', 'placeholder_column' => $colId],
                ],
                [
                    'name' => 'Link',
                    'attributes' => ['class' => 'outbox-icon', 'target' => '_blank'],
                    'link' => ['href' => '/hello/again', 'placeholder_column' => $colId]
                ]
            ],
        ]);

        return $this;
    }
}