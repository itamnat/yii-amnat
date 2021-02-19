<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Department;

/* @var $this yii\web\View */
/* @var $model app\models\Contacts */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'ทำเนียบบุคลากร', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="contacts-view">

    <h1><?php //= Html::encode($this->title) ?></h1>

        <?= Html::a('แก้ไขข้อมูล', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

    <div class="col-xs-12">
        <div class="x_panel">
        <div class="x_title">
        <h2><i class="fa fa-laptop"></i> รายละเอียด</h2>
        <div class="clearfix"></div>
        </div>
        <div class="x_content">    
        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fullname',
            'position',
            // 'dep_code',
            'hospital.department',
            'email:email',
            'tel:html',
            'fax',
            [

                'label' => 'Label', //label to be displayed
    
                'attribute' => 'attribute', //the attribute name
    
                'value' => Html::a('call now', 'tel:08011111111'),
    
                'format' => 'raw', //yii2 documentation -> yii\grid\DataColumn  you can check the types
    
            ],
            'tel_moi',
            'mobile_fix',
            'mobile_phone',
            // 'image',
            [
                'format'=>'raw',
                'attribute'=>'image',
                'value'=>Html::img($model->photoViewer,['class'=>'img-thumbnail','style'=>'width:200px;'])
            ],
            // 'created_at',
            // 'updated_at',
            // 'created_by',
            // 'updated_by',
        ],
    ]) ?>
        </div>
        </div>    
        </div>
    

</div>
