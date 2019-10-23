<?php

return [
    /* https://stackoverflow.com/questions/20183622/how-do-i-set-a-default-configuration-for-gridview-in-yii2-without-the-widget-fac */
    'definitions' => [
        // gridview
        'yii\grid\GridView' => [
            'layout' => "{items}\n{pager}"
        ],
    ],
];
