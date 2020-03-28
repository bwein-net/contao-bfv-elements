<?php

$GLOBALS['TL_DCA']['tl_bwein_bfv_elements_setting'] = [
    'config' => [
        'dataContainer' => 'Table',
        'enableVersioning' => true,
        'sql' => [
            'keys' => [
                'id' => 'primary',
            ],
        ],
    ],

    'list' => [
        'sorting' => [
            'mode' => 1,
            'fields' => ['name ASC'],
            'panelLayout' => 'filter;sort,search,limit',
            'disableGrouping' => true
        ],
        'label' => [
            'fields' => ['name'],
            'format' => '%s',
        ],
        'global_operations' => [
            'all' => [
                'label' => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href' => 'act=select',
                'class' => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"',
            ],
        ],
        'operations' => [
            'edit' => [
                'href' => 'act=edit',
                'icon' => 'edit.svg',
            ],
            'copy' => [
                'href' => 'act=copy',
                'icon' => 'copy.svg',
            ],
            'delete' => [
                'href' => 'act=delete',
                'attributes' => 'onclick="if(!confirm(\''.$GLOBALS['TL_LANG']['MSC']['deleteConfirm'].'\'))return false;Backend.getScrollOffset()"',
                'icon' => 'delete.svg',
            ],
            'show' => [
                'href' => 'act=show',
                'icon' => 'show.svg',
            ],
        ],
    ],

    'palettes' => [
        'default' => 'name;{id_legend},clubId,teamId,seasonId;
        {color_legend},colorResults,colorNav,backgroundNav,colorClubName',
    ],

    'fields' => [
        'id' => [
            'sql' => 'int(10) unsigned NOT NULL auto_increment',
        ],
        'pid' => [
            'sql' => 'int(10) unsigned',
        ],
        'tstamp' => [
            'sql' => "int(10) unsigned NOT NULL default '0'",
        ],
        'name' => [
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'length' => 1,
            'eval' => [
                'unique' => true,
                'mandatory' => true,
                'maxlength' => 255,
            ],
            'sql' => "varchar(255) NOT NULL default ''",
        ],
        'clubId' => [
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'maxlength' => 255,
                'decodeEntities' => true,
                'tl_class' => 'clr',
            ],
            'sql' => "varchar(255) NOT NULL default ''",
        ],
        'teamId' => [
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'maxlength' => 255,
                'decodeEntities' => true,
                'tl_class' => 'clr',
            ],
            'sql' => "varchar(255) NOT NULL default ''",
        ],
        'seasonId' => [
            'exclude' => true,
            'search' => true,
            'inputType' => 'text',
            'eval' => [
                'maxlength' => 255,
                'decodeEntities' => true,
                'tl_class' => 'clr',
            ],
            'sql' => "varchar(255) NOT NULL default ''",
        ],
        'colorResults' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => [
                'maxlength' => 6,
                'colorpicker' => true,
                'isHexColor' => true,
                'decodeEntities' => true,
                'tl_class' => 'w50 wizard',
            ],
            'sql' => "varchar(64) NOT NULL default ''",
        ],
        'colorNav' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => [
                'maxlength' => 6,
                'colorpicker' => true,
                'isHexColor' => true,
                'decodeEntities' => true,
                'tl_class' => 'w50 wizard',
            ],
            'sql' => "varchar(64) NOT NULL default ''",
        ],
        'backgroundNav' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => [
                'maxlength' => 6,
                'colorpicker' => true,
                'isHexColor' => true,
                'decodeEntities' => true,
                'tl_class' => 'w50 wizard',
            ],
            'sql' => "varchar(64) NOT NULL default ''",
        ],
        'colorClubName' => [
            'exclude' => true,
            'inputType' => 'text',
            'eval' => [
                'maxlength' => 6,
                'colorpicker' => true,
                'isHexColor' => true,
                'decodeEntities' => true,
                'tl_class' => 'w50 wizard',
            ],
            'sql' => "varchar(64) NOT NULL default ''",
        ],
    ],
];
