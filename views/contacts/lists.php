<?php

use yii\helpers\Html;
use yii\grid\GridView;
use fedemotta\datatables\DataTables;
use app\models\Contacts;
use app\models\ContactsSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ทำเนียบผู้บริหาร';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacts-index">
    <div class="x_panel">
        <div class="x_content">
            <?php // echo $this->render('_search', ['model' => $searchModel]); 
            ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn',
                    'headerOptions' => ['style'=>'text-align: center'],
                    'contentOptions' => ['style'=>'text-align: center;vertical-align: middle;'],
                ],

                    // 'id',
                    [
                        'attribute'=>'fullname',
                        'label'=>'ชื่อ - สกุล',
                        'headerOptions' => ['style'=>'text-align: center'],
                        'contentOptions' => ['style'=>'padding:0px 0px 0px 15px;vertical-align: middle;'],
                    ],
                    // 'fullname',
                    [
                        'attribute'=>'position',
                        'label'=>'ตำแหน่ง',
                        'headerOptions' => ['style'=>'text-align: center'],
                    ],
                    // 'position',
                    // 'dep_code',
                    // 'email:email',
                    [
                        'attribute'=>'tel',
                        'label'=>'โทร (045)',
                        'headerOptions' => ['style'=>'text-align: center'],
                    ],
                    // 'tel',
                    [
                        'attribute'=>'fax',
                        'label'=>'โทรสาร (045)',
                        'headerOptions' => ['style'=>'text-align: center'],
                    ],
                    // 'fax',
                    [
                        'attribute'=>'tel_moi',
                        'label'=>'สื่อสาร (มท.)',
                        'headerOptions' => ['style'=>'text-align: center'],
                        'contentOptions' => ['style'=>'text-align: center;vertical-align: middle;'],
                    ],
                    // 'tel_moi',
                    [
                        'attribute'=>'mobile_fix',
                        'label'=>'เบอร์ประจำตำแหน่ง',
                        'headerOptions' => ['style'=>'text-align: center'],
                    ],
                    // 'mobile_fix',
                    //'mobile_phone',
                    //'image',
                    //'created_at',
                    //'updated_at',
                    //'created_by',
                    //'updated_by',

                    // ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>



</div>