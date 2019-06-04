<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datetimepicker\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Lenteterm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lenteterm-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Graduacion_base')->textInput() ?>

    <?= $form->field($model, 'Graduacion_excedente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Precio_compra')->textInput() ?>

    <?= $form->field($model, 'Porcentaje_ganancia')->textInput() ?>

    <?= $form->field($model, 'Existencia')->textInput() ?>

    <?= $form->field($model, 'Material_id')->widget(Select2::classname(),[
        'data' => $mats,
        'options'=>['placeholder'=>'Seleccione el material'],
        'pluginOptions'=>['allowClear=>true'],
    ]) ?>
    <p>
    <?= Html::a(Yii::t('app', 'Registrar Nuevo Material'), ['materiall/create', 'inv'=>2, 'invo'=>$inv], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= $form->field($model, 'Tipo_id')->widget(Select2::classname(),[
        'data' => $tips,
        'options'=>['placeholder'=>'Seleccione el tipo'],
        'pluginOptions'=>['allowClear=>true'],
    ]) ?>
    <p>
    <?= Html::a(Yii::t('app', 'Registrar Nuevo Tipo'), ['tipo/create', 'inv'=>2, 'invo'=>$inv], ['class' => 'btn btn-primary']) ?>
    </p>
<!--
    <?= $form->field($model, 'Precio_venta')->textInput() ?>
-->
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Registrar'), ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Cancelar'), ['entrada/createinlt', 'id'=>0], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
