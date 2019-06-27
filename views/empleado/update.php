<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Empleado */

$this->title = Yii::t('app', 'Editar Empleado: {name}', [
    'name' => $model->Nombre,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Empleados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Editar');
?>
<div class="empleado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'conts' => $conts,
        'profs' => $profs,
        'cargs' => $cargs,
    ]) ?>

</div>
