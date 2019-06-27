<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pagopefectivo */

$this->title = Yii::t('app', 'Registrar Pago en Efectivo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pagopefectivos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Financiero'), 'url' => ['financiero/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proveedores'), 'url' => ['proveedores/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proveedor'), 'url' => ['proveedores/view','id' => $idp]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pagopefectivo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'emps' => $emps,
        'idp' => $idp,
    ]) ?>

</div>
