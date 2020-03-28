<?php

$GLOBALS['TL_DCA']['tl_content']['palettes']['bfvWidget'] = '
    {type_legend},type,headline;
    {bfvWidget_legend},
        bfvWidgetProvider,bfvSetting,
        bfvWidgetWidth,bfvWidgetHeight;
    {template_legend:hide},customTpl;
    {protected_legend:hide},protected;
    {expert_legend:hide},guests,cssID;
    {invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['fields']['bfvWidgetProvider'] = [
    'exclude' => true,
    'filter' => true,
    'inputType' => 'select',
    'eval' => [
        'mandatory' => true,
        'chosen' => true,
        'tl_class' => 'w50',
        'includeBlankOption' => true,
    ],
    'sql' => "varchar(128) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['bfvSetting'] = [
    'exclude' => true,
    'filter' => true,
    'inputType' => 'select',
    'eval' => [
        'mandatory' => true,
        'chosen' => true,
        'tl_class' => 'w50',
        'includeBlankOption' => true,
    ],
    'sql' => 'int(10) unsigned NOT NULL default \'0\'',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['bfvWidgetWidth'] = [
    'exclude' => true,
    'inputType' => 'inputUnit',
    'options' => $GLOBALS['TL_CSS_UNITS'],
    'eval' => [
        'includeBlankOption' => true,
        'rgxp' => 'digit',
        'tl_class' => 'clr w50',
    ],
    'sql' => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['bfvWidgetHeight'] = [
    'exclude' => true,
    'inputType' => 'inputUnit',
    'options' => $GLOBALS['TL_CSS_UNITS'],
    'eval' => [
        'includeBlankOption' => true,
        'rgxp' => 'digit',
        'tl_class' => 'w50',
    ],
    'sql' => "varchar(255) NOT NULL default ''",
];
