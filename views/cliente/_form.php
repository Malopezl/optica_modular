<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NIT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Correo_Electronico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Correo_electronico2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefono2')->textInput(['maxlength' => true]) ?>
<!--
    <?= $form->field($model, 'Saldo')->textInput() ?>
-->
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Registrar'), ['class' => 'btn btn-success']) ?>
        <?php
            if($inv == 1)
            {
                echo Html::a(Yii::t('app', 'Cancelar'), ['cliente/index'], ['class' => 'btn btn-danger']); 
            }
            else if ($inv == 2)
            {
                echo Html::a(Yii::t('app', 'Cancelar'), ['venta/create', 'id'=> 0], ['class' => 'btn btn-danger']); 
            }
         ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
