<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Compras */

$this->title = Yii::t('app', 'Nueva Compra');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Financiero'), 'url' => ['financiero/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Compras'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compras-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'provs' => $provs,
		'emps' => $emps,
    ]) ?>

</div>
