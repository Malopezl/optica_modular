<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datetimepicker\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Aro */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="aro-form">

    <?php $form = ActiveForm::begin(); ?>
<!--
       <?= $form->field($model, 'Precio_compra')->textInput() ?>
            <?= $form->field($model, 'Existencia')->textInput() ?>
        <?= $form->field($model, 'Precio_venta')->textInput() ?>
    
    <?= $form->field($model, 'Porcentaje_ganancia')->textInput() ?>
-->
 

    <?= $form->field($model, 'Codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Material_id')->widget(Select2::classname(),[
        'data' => $mats,
        'options'=>['placeholder'=>'Seleccione el material'],
        'pluginOptions'=>['allowClear=>true'],
    ]) ?>

    <?= $form->field($model, 'Marca_id')->widget(Select2::classname(),[
        'data' => $mars,
        'options'=>['placeholder'=>'Seleccione el material'],
        'pluginOptions'=>['allowClear=>true'],
    ]) ?>

    
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Registrar'), ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Cancelar'), ['inventario/mercaderia'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
