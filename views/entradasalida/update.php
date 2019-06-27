<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Entradasalida */

$this->title = Yii::t('app', 'Editar Asistencia: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Entradasalidas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Editar');
?>
<div class="entradasalida-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'emps' => $emps,
    ]) ?>

</div>
