<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Detallecompra */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detallecompra-form">

    <?php $form = ActiveForm::begin(); ?>

<!--
    <?= $form->field($model, 'Total')->textInput() ?>
-->
    <?php
    if($op == 1)
    {
        echo $form->field($model, 'Lenteterm_id')->textInput();
    }
    else if($op == 2)
    {
        echo $form->field($model, 'Lentesterm_id')->textInput();
    }else if($op == 3)
    {
        echo $form->field($model, 'Accesorios_id')->textInput();
    }else if($op == 4)
    {
        echo $form->field($model, 'Aro_id')->textInput();
    }else if($op == 5)
    {
        echo $form->field($model, 'Mobyequipo_id')->textInput();
    }
    
    ?>

    <?= $form->field($model, 'Cantidad')->textInput() ?>

    <?= $form->field($model, 'Precio_compra')->textInput() ?>
<!--
    <?= $form->field($model, 'Compras_id')->textInput() ?>
-->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Registrar'), ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Regresar'), ['compras/creates', 'id' => $id], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
