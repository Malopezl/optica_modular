<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tipo */

$this->title = Yii::t('app', 'Registrar Tipo de Lente');
if ($invo == 1)
{
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['inventario/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mercaderia'), 'url' => ['inventario/mercaderia']];
if($inv == 1)
{
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ingreso'), 'url' => ['entrada/createinlst','id'=>0]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lente Semiterminado'), 'url' => ['lentesterm/create', 'inv' => $invo]];
}
else if($inv == 2)
{
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ingreso'), 'url' => ['entrada/createinlt','id'=>0]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lente Terminado'), 'url' => ['lenteterm/create', 'inv' => $invo]];
}
$this->params['breadcrumbs'][] = $this->title;
}
else if($invo == 2 ){


$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['inventario/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalles'), 'url' => ['inventario/detalles']];
$this->params['breadcrumbs'][] = $this->title;
}
?>
<div class="tipo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'invo' => $invo,
        'inv' => $inv,
        'op' => $op,
            'ido' => $ido,
    ]) ?>

</div>
