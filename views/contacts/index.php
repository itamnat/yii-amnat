<?php

use yii\helpers\Html;
use yii\grid\GridView;
use fedemotta\datatables\DataTables;
use app\models\Contacts;
use app\models\ContactsSearch;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ข้อมูลบุคลากร';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacts-index">

    <h2><?= Html::encode($this->title) ?></h2>

    <p>

    </p>
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-laptop"></i>
                <?= Html::a('เพิ่มข้อมูล', ['create'], ['class' => 'btn btn-success']) ?>
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <?php // echo $this->render('_search', ['model' => $searchModel]); 
            ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // 'id',
                    'fullname',
                    [
                        'attribute' => 'position',
                        'contentOptions' => ['style' => 'white-space: nowrap;'],
                    ],
                    // 'position',
                    // 'dep_code',
                    // 'email:email',
                    'tel',
                    'fax',
                    // 'tel_moi',
                    [
                        'attribute' => 'tel_moi',
                        'contentOptions' => [ 'style' => 'text-align: center' ],

                    ],
                    'mobile_fix',
                    // 'mobile_phone',
                    //'image',
                    //'created_at',
                    //'updated_at',
                    //'created_by',
                    //'updated_by',

                    // ['class' => 'yii\grid\ActionColumn'],
                    [
                        'class' => 'yii\grid\ActionColumn',

                        'template' => '{copy} {view} {update} {delete}',
                        'options' => ['style' => 'width:100px;'],
                        'contentOptions' => [
                            'noWrap' => true
                        ],

                    ],
                ],
            ]); ?>

        </div>
    </div>
</div>