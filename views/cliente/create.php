<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = Yii::t('app', 'Registrar Cliente');
if($inv == 1)
{
	$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas'), 'url' => ['cventas/index']];
	$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clientes'), 'url' => ['index']];
}
else if($inv == 2)
{
	$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas'), 'url' => ['cventas/index']];
	$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Venta'), 'url' => ['venta/index']];
	$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nueva Venta'), 'url' => ['venta/create','id'=>0]];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'inv' => $inv,
    ]) ?>

</div>
