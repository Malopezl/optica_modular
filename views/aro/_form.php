<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Aro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aro-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Precio_compra')->textInput() ?>

    <?= $form->field($model, 'Porcentaje_ganancia')->textInput() ?>

    <?= $form->field($model, 'Precio_venta')->textInput() ?>

    <?= $form->field($model, 'Codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Material_id')->textInput() ?>

    <?= $form->field($model, 'Marca_id')->textInput() ?>

    <?= $form->field($model, 'Existencia')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
