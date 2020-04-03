<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Formulario */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Formularios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="formulario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= null //Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= null /*Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])*/ ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
            'pais',
            'ciudad',
            'carrier',
            [
                'attribute' => 'valido',
                'value' => $model->valido ? 'Si' : 'No',
            ]
        ],
    ]) ?>

</div>
