<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ListsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ทำเนียบผู้บริหาร';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="lists-index">
    <div id="ajaxCrudDatatable">

        <?php yii\widgets\Pjax::begin(['id' => 'crud-datatable', 'timeout' => 5000]) ?>
        <!-- เรียก view _search.php -->
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
        <br>
        <?= GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            // 'filterModel' => $searchModel,
            
            'pjax' => true,
            
            'tableOptions' => [
                'class' => 'table table-bordered  table-striped table-hover',
              ],
            'columns' => require(__DIR__ . '/_columns.php'),
            'toolbar' => [
                // ['content'=>
                //     Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                //     ['role'=>'modal-remote','title'=> 'Create new Lists','class'=>'btn btn-default']).
                //     Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                //     ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).
                //     '{toggleData}'.
                //     '{export}'
                // ],
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'panel' => [
                'type' => 'success',
                'heading' => '<i class="glyphicon glyphicon-list"></i> รายนาม',
                'footer'=>false
                // 'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
                // 'after'=>BulkButtonWidget::widget([
                //             'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Delete All',
                //                 ["bulk-delete"] ,
                //                 [
                //                     "class"=>"btn btn-danger btn-xs",
                //                     'role'=>'modal-remote-bulk',
                //                     'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                //                     'data-request-method'=>'post',
                //                     'data-confirm-title'=>'Are you sure?',
                //                     'data-confirm-message'=>'Are you sure want to delete this item'
                //                 ]),
                //         ]).                        
                // '<div class="clearfix"></div>',
            ]
        ]) ?>
        <?php yii\widgets\Pjax::end() ?>
    </div>
</div>
<?php Modal::begin([
    "id" => "ajaxCrudModal",
    "footer" => "", // always need it for jquery plugin
]) ?>
<?php Modal::end(); ?>