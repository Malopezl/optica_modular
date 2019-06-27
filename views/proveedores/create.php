<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Proveedores */

$this->title = Yii::t('app', 'Registrar Proveedor');
if($inv == 1)
{

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Financiero'), 'url' => ['financiero/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Compras'), 'url' => ['compras/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nueva Compra'), 'url' => ['compras/create']];
}
else if($inv == 2)
{
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Financiero'), 'url' => ['financiero/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proveedores'), 'url' => ['index']];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proveedores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
       	'inv' => $inv,
    ]) ?>

</div>
