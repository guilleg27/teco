<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FormularioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Formularios';
$this->params['breadcrumbs'][] = $this->title;
?>
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
