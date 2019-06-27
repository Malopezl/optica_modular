<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Venta */

$this->title = Yii::t('app', 'Finalizar venta', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Financiero')];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Compras')];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Finalizar')];
?>
<div class="compras-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_forms', [
        'model' => $model,
        'provs' => $provs,
		'emps' => $emps,
    ]) ?>

</div>
