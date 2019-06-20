<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materiala */

$this->title = Yii::t('app', 'Registrar Material Aros');
if ($invo == 1)
{
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['inventario/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mercaderia'), 'url' => ['inventario/mercaderia']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ingreso'), 'url' => ['entrada/createinar','id'=>0]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Aro'), 'url' => ['aro/create', 'inv' => $invo]];
$this->params['breadcrumbs'][] = $this->title;
}
else if($invo == 2 ){


$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['inventario/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalles'), 'url' => ['inventario/detalles']];
$this->params['breadcrumbs'][] = $this->title;
}
?>
<div class="materiala-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'invo' => $invo,
        'inv' => $inv,
    ]) ?>

</div>
