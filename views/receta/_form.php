<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Receta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Fecha')->textInput() ?>

    <?= $form->field($model, 'Esfera_OD')->textInput() ?>

    <?= $form->field($model, 'Esfera_OI')->textInput() ?>

    <?= $form->field($model, 'Eje_OD')->textInput() ?>

    <?= $form->field($model, 'Eje_OI')->textInput() ?>

    <?= $form->field($model, 'Cilindro_OD')->textInput() ?>

    <?= $form->field($model, 'Cilindro_OI')->textInput() ?>

    <?= $form->field($model, 'Adicion_OD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Adicion_OI')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Cliente_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
