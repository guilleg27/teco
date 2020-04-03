<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use johnitvn\ajaxcrud\CrudAsset; 
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use arturoliveira\ExcelView;

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
                <?= Html::a('Export', [
                        'formulario/export', 
                        'startDate'=>$startDate, 
                        'endDate'=>$endDate, 
                    ], 
                    [
                        'class' => 'btn btn-primary btn-md', 
                        'target' => '_blank'
                    ]) 
                ?>
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
            [
                'attribute' => 'providerId',
                'visible' => Yii::$app->user->identity->username != 'personal'
            ],
            [
                'attribute' => 'pubId',
                'visible' => Yii::$app->user->identity->username != 'personal'
            ],
            [
                'attribute' => 'pais',
            ],
            [
                'attribute' => 'ciudad',
            ],
            [
                'attribute' => 'carrier',
            ],
            [
                'format' => 'raw',
                'value' => function($model){
                    return Html::a($model->valido ? 'Valido' : 'Invalido', 'javascript:void(0);', [
                        'id' => $model->id,
                        'onClick' => '
                            $.post( "'.Url::to(['formulario/validar', 'id' => $model->id]).'", function( data ) {
                                var response = JSON.parse(data);
                                if(response.code === 200){
                                    $("#'.$model->id.'").html( $("#'.$model->id.'").html() === "Valido" ? "Invalido" : "Valido" );
                                    $("#'.$model->id.'").removeClass();
                                    $("#'.$model->id.'").addClass( $("#'.$model->id.'").html() === "Valido" ? "btn btn-success" : "btn btn-danger" );
                                }
                            });
                        ',
                        'class' => $model->valido ? 'btn btn-success' : 'btn btn-danger'
                    ]);
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}'
            ],

        ],
        'responsive' => false,
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
        'export' => false,
        
    ]); Pjax::end(); ?>


</div>
