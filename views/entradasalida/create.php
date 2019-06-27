<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Entradasalida */

$this->title = Yii::t('app', 'Nueva Asistencia');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recursos Humanos'), 'url' => ['rhumanos/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Registro de Asistencias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entradasalida-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'emps' => $emps,
    ]) ?>

</div>
