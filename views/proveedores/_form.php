<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Proveedores */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proveedores-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NIT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefono2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Correo1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Correo2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Direccion')->textInput(['maxlength' => true]) ?>
<!--
    <?= $form->field($model, 'Saldo')->textInput() ?>
-->
    <div class="form-group">
        <?php 
        echo Html::submitButton(Yii::t('app', 'Registrar'), ['class' => 'btn btn-success']);
        if($inv == 1)
        {
            echo " ";
            echo Html::a(Yii::t('app', 'Cancelar'), ['compras/create', 'idp'=> 0], ['class' => 'btn btn-danger']);
        }
        else if($inv == 2)
        {
            echo " ";
            echo Html::a(Yii::t('app', 'Cancelar'), ['proveedores/index'], ['class' => 'btn btn-danger']);
        }
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
