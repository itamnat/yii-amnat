<?php

use phpDocumentor\Reflection\Types\Null_;
use yii\helpers\Url;

return [
    // [
    //     'class' => 'kartik\grid\CheckboxColumn',
    //     'width' => '20px',
    // ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'id',
    // ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'fullname',
        'label' => 'ชื่อ - สกุล',
        'headerOptions' => ['style' => 'text-align: center'],
        'contentOptions' => ['style' => 'padding:0px 0px 0px 15px;vertical-align: middle;'],
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'position',
        'label' => 'ตำแหน่ง',
        'headerOptions' => ['style' => 'text-align: center'],

    ],
    // [
    //     'class' => '\kartik\grid\DataColumn',
    //     'attribute' => 'dep_code',
    // ],
    // [
    //     'class' => '\kartik\grid\DataColumn',
    //     'attribute' => 'email',
    // ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'tel',
        'label' => 'โทร (045)',
        'headerOptions' => ['style' => 'text-align: center'],
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'fax',
        'label' => 'โทรสาร (045)',
        'headerOptions' => ['style' => 'text-align: center'],
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'mobile_fix',
        'label' => 'เบอร์ประจำตำแหน่ง',
        'headerOptions' => ['style' => 'text-align: center'],
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'fax',
        'label' => 'โทรสาร (045)',
        'headerOptions' => ['style' => 'text-align: center'],
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'template' => '{view}',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'viewOptions' => ['role' => 'modal-remote', 'title' => 'View', 'data-toggle' => 'tooltip','class'=>'btn btn-danger btn-xs'],
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],
        'deleteOptions' => [
            'role' => 'modal-remote', 'title' => 'Delete',
            'data-confirm' => false, 'data-method' => false, // for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Are you sure?',
            'data-confirm-message' => 'Are you sure want to delete this item'
        ],
    ],

];
