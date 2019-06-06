<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Mobyequipo */

$this->title = 'Moviliario y Equipoo';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['inventario/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mobiliario y Equipo'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mobyequipo-view">

    <h1><?= Html::encode($this->title) ?></h1>
<!--
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
-->
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'Descripcion:ntext',
            'fechaCompra',
            'Precio_compra',
            'Existencia',
            //'Depreciacion_id',
            'Precio_venta',
        ],
    ]) ?>
     <p><li><label>Depreciacion:</label></li></p>
    <?php
    if($model->Depreciacion_id != null)
    {
        echo DetailView::widget([
        'model' => $model1,
        'attributes' => [
            //'id',
            'Nombre',
            'Descripcion:ntext',
            'porcentaje',
        ],
    ]);  
    }
    echo Html::a(Yii::t('app', 'Regresar'), ['index'], ['class' => 'btn btn-primary']);
   ?>

</div>
