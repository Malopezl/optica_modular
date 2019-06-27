<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VentaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Nodocumento') ?>

    <?= $form->field($model, 'Fecha') ?>

    <?= $form->field($model, 'Total') ?>

    <?= $form->field($model, 'Credito') ?>

    <?php // echo $form->field($model, 'Contado') ?>

    <?php // echo $form->field($model, 'Cliente_id') ?>

    <?php // echo $form->field($model, 'Encargado') ?>

    <?php // echo $form->field($model, 'Finalizada') ?>

    <?php // echo $form->field($model, 'Entregada') ?>

    <?php // echo $form->field($model, 'Empleado_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
