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

-->
 

    <?= $form->field($model, 'Codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Material_id')->widget(Select2::classname(),[
        'data' => $mats,
        'options'=>['placeholder'=>'Seleccione el material'],
        'pluginOptions'=>['allowClear=>true'],
    ]) ?>
    <p>
    <?= Html::a(Yii::t('app', 'Registrar Nuevo Material'), ['materiala/create', 'inv'=>1, 'invo'=>$inv, 'op'=>$op , 'idp' => 0,'ido'=> $ido], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= $form->field($model, 'Marca_id')->widget(Select2::classname(),[
        'data' => $mars,
        'options'=>['placeholder'=>'Seleccione la marca'],
        'pluginOptions'=>['allowClear=>true'],
    ]) ?>
    <p>
    <?= Html::a(Yii::t('app', 'Registrar Nueva Marca'), ['marca/create', 'inv'=>1, 'invo'=>$inv, 'op'=>$op ,'ido'=> $ido], ['class' => 'btn btn-primary']) ?>
    </p>

    
    <?= $form->field($model, 'Porcentaje_ganancia')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Registrar'), ['class' => 'btn btn-success']) ?>
        <?php 
        if ($inv == 1)
        {
            echo  Html::a(Yii::t('app', 'Cancelar'), ['entrada/createinlst', 'id' => 0], ['class' => 'btn btn-danger']);
        }
        else if($inv == 3)
        {
             echo  Html::a(Yii::t('app', 'Cancelar'), ['detallecompra/create','id'=> $ido, 'op'=>$op , 'idp' => 0], ['class' => 'btn btn-danger']);
        }

        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
