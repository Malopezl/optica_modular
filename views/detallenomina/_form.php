<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Detallenomina */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detallenomina-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'Horas_extra')->textInput() ?>

    <?= $form->field($model, 'bonos_extra')->textInput() ?>

    <?= $form->field($model, 'B_incentivo')->textInput() ?>

    <?= $form->field($model, 'Sub_total')->textInput() ?>

    <?= $form->field($model, 'T_devengado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Igss_total')->textInput() ?>

    <?= $form->field($model, 'Isr_total')->textInput() ?>

    <?= $form->field($model, 'D_extra')->textInput() ?>

    <?= $form->field($model, 'T_descuentos')->textInput() ?>

    <?= $form->field($model, 'T_percibido')->textInput() ?>

    <?= $form->field($model, 'Nomina_id')->textInput() ?>

    <?= $form->field($model, 'Empleado_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Ingresar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
