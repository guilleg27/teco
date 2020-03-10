<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use johnitvn\ajaxcrud\CrudAsset; 
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FormularioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Formularios';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);
$layout = <<< HTML
    <span class="input-group-addon">From </span>
    {input1}
    {separator}
    <span class="input-group-addon">To </span>
    {input2}
    <span class="input-group-addon kv-date-remove">
        <i class="glyphicon glyphicon-remove"></i>
    </span>
HTML;
?>
<div class="row">
    <div class="col-md-12">
      <div class="box box-default">
        <div class="box-body">
            <?php $form = ActiveForm::begin([
                // 'action' => ['', 'type_crm_id' => $type_crm_id],
                'method' => 'get',
            ]); ?>
            <?php   echo '<label class="control-label">Date Range</label>';
                    echo DatePicker::widget([
                        'type' => DatePicker::TYPE_RANGE,
                        'name' => 'startDate',
                        'value' => $startDate,
                        'name2' => 'endDate',
                        'value2' => $endDate,
                        'separator' => '<i class="glyphicon glyphicon-resize-horizontal"></i>',
                        'layout' => $layout,
                        'pluginOptions' => [
                            'autoclose' => true,
                            // 'startView'=>'year',
                            // 'minViewMode'=>'months',
                            'format' => 'yyyy-mm-dd'
                        ]
                    ]);
             ?>
            <br />
            <div class="form-group">
                <?= Html::submitButton('Filter', ['class' => 'btn btn-primary btn-md']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<br /><br /><br /><br />
<div class="formulario-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php  Pjax::begin(); echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre_completo',
            'email:email',
            'celular',
            'date',
            'ktoken',
            'plan',
            'providerId',
            'pubId',

            ['class' => 'yii\grid\ActionColumn'],

        ],
        'responsive' => true,
        'hover' => true,
        'condensed' => true,
        'floatHeader' => true,

        'panel' => [
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-th-list"></i> '.Html::encode($this->title).' </h3>',
            'type' => 'info',
            // 'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> Add', ['create'], ['class' => 'btn btn-success']),
            'after' => Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset List', ['index'], ['class' => 'btn btn-info']),
            'showFooter' => false
        ],
        'export' => [
            'label'=>'Export',
        ],
        'exportConfig' => [
            GridView::CSV => ['filename' => 'TelecomLeads'],
            GridView::EXCEL => ['filename' => 'TelecomLeads'],
        ]
    ]); Pjax::end(); ?>


</div>
