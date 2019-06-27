<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetallenominaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detallenomina-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Horas_extra') ?>

    <?= $form->field($model, 'bonos_extra') ?>

    <?= $form->field($model, 'B_incentivo') ?>

    <?= $form->field($model, 'Sub-total') ?>

    <?php // echo $form->field($model, 'T_devengado') ?>

    <?php // echo $form->field($model, 'Igss_total') ?>

    <?php // echo $form->field($model, 'Isr_total') ?>

    <?php // echo $form->field($model, 'D_extra') ?>

    <?php // echo $form->field($model, 'T_descuentos') ?>

    <?php // echo $form->field($model, 'T_percibido') ?>

    <?php // echo $form->field($model, 'Nomina_id') ?>

    <?php // echo $form->field($model, 'Empleado_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
