<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Lists */
?>
<div class="lists-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fullname',
            'position',
            'dep_code',
            'email:email',
            'tel',
            'fax',
            'tel_moi',
            'mobile_fix',
            'mobile_phone',
            'image',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
