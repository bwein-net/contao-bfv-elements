<?php

$GLOBALS['TL_DCA']['tl_content']['palettes']['bfvWidget'] = '
    {type_legend},type,headline;
    {bfvWidget_legend},
        bfvWidgetProvider,
        bfvWidgetClubId,bfvWidgetTeamId,
        bfvWidgetSeasonId,
        bfvWidgetWidth,bfvWidgetHeight,
        bfvWidgetColorResults,bfvWidgetColorNav,bfvWidgetBackgroundNav,bfvWidgetColorClubName;
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

$GLOBALS['TL_DCA']['tl_content']['fields']['bfvWidgetClubId'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => [
        'maxlength' => 255,
        'decodeEntities' => true,
        'tl_class' => 'clr w50',
    ],
    'sql' => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['bfvWidgetTeamId'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => [
        'maxlength' => 255,
        'decodeEntities' => true,
        'tl_class' => 'w50',
    ],
    'sql' => "varchar(255) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['bfvWidgetSeasonId'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => [
        'maxlength' => 255,
        'decodeEntities' => true,
        'tl_class' => 'w50',
    ],
    'sql' => "varchar(255) NOT NULL default ''",
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

$GLOBALS['TL_DCA']['tl_content']['fields']['bfvWidgetColorResults'] = [
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
];

$GLOBALS['TL_DCA']['tl_content']['fields']['bfvWidgetColorNav'] = [
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
];

$GLOBALS['TL_DCA']['tl_content']['fields']['bfvWidgetBackgroundNav'] = [
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
];

$GLOBALS['TL_DCA']['tl_content']['fields']['bfvWidgetColorClubName'] = [
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
];
