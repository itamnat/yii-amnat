<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ListsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lists-search">

<?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['data-pjax' => true ]
    ]); ?>

    

    <?php // echo $form->field($model, 'tel') ?>

    <?php // echo $form->field($model, 'fax') ?>

    <?php // echo $form->field($model, 'tel_moi') ?>

    <?php // echo $form->field($model, 'mobile_fix') ?>

    <?php // echo $form->field($model, 'mobile_phone') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'updated_by') ?>

    <div class="input-group">
      <?= Html::activeTextInput($model, 'q',['class'=>'form-control','placeholder'=>'ค้นหาข้อมูล...']) ?>
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i> ค้นหา</button>
        <? //= Html::a('<i class="glyphicon glyphicon-plus"></i> '.Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-default']) ?>
      </span>
    </div>

    <?php ActiveForm::end(); ?>

</div>
