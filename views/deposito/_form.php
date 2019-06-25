<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Deposito */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="deposito-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nodocumento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Monto')->textInput() ?>

    <?= $form->field($model, 'Fecha')->textInput() ?>

    <?= $form->field($model, 'Empleado_id')->textInput() ?>

    <?= $form->field($model, 'Bancos_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
