<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;
use yii\helpers\Url;

use app\models\Department;

/* @var $this yii\web\View */
/* @var $model app\models\Contacts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contacts-form">

  <?php $form = ActiveForm::begin([
    'options' => ['enctype' => 'multipart/form-data']
  ]); ?>

  <div id="w0" class="x_panel">
    <div class="x_title">
      <h4><i class="fa fa-windows"></i> ข้อมูลส่วนบุคคล</h4>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="row">
        <div class="col-xs-12">
          <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

          <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

          <?= $form->field($model, 'dep_code')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Department::find()->all(), 'dep_id', 'department'),
          ]);
          ?>

          <?= $form->field($model, 'email')->input('email') ?>
        </div>

        <div class="col-xs-12 col-md-4">

          <?= $form->field($model, 'tel')->widget(\yii\widgets\MaskedInput::className(), [
            'mask' => '9 9999 9999',
          ]) ?>

        </div>
        <div class="col-xs-12 col-md-4">

          <?= $form->field($model, 'fax')->widget(\yii\widgets\MaskedInput::className(), [
            'mask' => '9 9999 9999',
          ]) ?>

        </div>
        <div class="col-xs-12 col-md-4">

          <?= $form->field($model, 'tel_moi')->widget(\yii\widgets\MaskedInput::className(), [
            'mask' => '99999',
          ]) ?>

        </div>
        <div class="col-xs-12 col-md-6">
          <?= $form->field($model, 'mobile_fix')->widget(\yii\widgets\MaskedInput::className(), [
            'mask' => '99 9999 9999',
          ]) ?>
        </div>
        <div class="col-xs-12 col-md-6">
          <?= $form->field($model, 'mobile_phone')->widget(\yii\widgets\MaskedInput::className(), [
            'mask' => '99 9999 9999',
          ]) ?>
        </div>
        <div class="row">
          <div class="col-md-2">
            <div class="well text-center">
              <?= Html::img($model->getPhotoViewer(), ['style' => 'width:100px;', 'class' => 'img-rounded']); ?>
            </div>
          </div>
          <div class="col-md-10">
            <?= $form->field($model, 'image')->fileInput() ?>
          </div>
        </div>
      </div>
    </div>
  </div>




















  <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>