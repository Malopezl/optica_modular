<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Detallecompra */


$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Financiero')];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Compras')];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalle compra'), 'url' => ['compras/creates','id' => $id]];
if($op == 1)
{
$this->title = Yii::t('app', 'Agregar Lente Terminado ');
}else if($op == 2)
{
	$this->title = Yii::t('app', 'Agregar Lente Semiterminado');
}else if($op == 3)
{
	$this->title = Yii::t('app', 'Agregar Aros');
}else if($op == 4)
{
	$this->title = Yii::t('app', 'Agregar Accesorios');
}else if($op == 5)
{
	$this->title = Yii::t('app', 'Agregar Mobiliario y equipo');
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallecompra-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id,
            'op' => $op,
            'aros' => $aros,
            'acces' => $acces,
            'lentes' => $lentes,
            'lentes1' => $lentes1,
    ]) ?>

</div>
