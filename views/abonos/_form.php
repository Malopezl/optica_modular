<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Abonos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="abonos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'Cliente_id')->textInput() ?>

    <?= $form->field($model, 'Fecha')->textInput() ?>

    <?= $form->field($model, 'Cantidad')->textInput() ?>

    <?= $form->field($model, 'Encargado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Nodocumento')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
