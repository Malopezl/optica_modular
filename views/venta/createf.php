<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Venta */

$this->title = Yii::t('app', 'Finalizar venta', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas')];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Venta')];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas')];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Finalizar')];
?>
<div class="venta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_forms', [
        'model' => $model,
        'clts' => $clts,
    ]) ?>

</div>
