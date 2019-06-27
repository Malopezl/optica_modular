<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PagopefectivoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pagopefectivo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'Caja_id') ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Monto') ?>

    <?= $form->field($model, 'Empleado_id') ?>

    <?= $form->field($model, 'Nodocumento') ?>

    <?php // echo $form->field($model, 'Proveedores_id') ?>

    <?php // echo $form->field($model, 'Fecha') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
