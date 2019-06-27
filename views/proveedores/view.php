<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Proveedores */

$this->title = 'Proveedor: '.$model->Nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Financiero'), 'url' => ['financiero/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proveedores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="proveedores-view">

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
    <p>
        <?= Html::a(Yii::t('app', 'Realizar Pago Efectivo'), ['pagopefectivo/create','idp' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Realizar Pago Cheque'), ['pagopbanco/create','idp' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Regresar'), ['index'], ['class' => 'btn btn-danger']) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'Nombre',
            'NIT',
            'Telefono',
            'Telefono2',
            'Correo1',
            'Correo2',
            'Direccion',
            'Saldo',
        ],
    ]) ?>

</div>
