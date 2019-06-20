<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Profesion */

$this->title = Yii::t('app', 'Editar Profesión: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recursos Humanos'), 'url' => ['rhumanos/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalles'), 'url' => ['rhumanos/detalles']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profesiones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Editar');
?>
<div class="profesion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
