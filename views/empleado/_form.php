<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Empleado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empleado-form">

    <?php $form = ActiveForm::begin( [
    "method" => 'post',
    "enableClientValidation"=> true,
    "options" => ["enctype" => "multipart/form-data"],
    ] ); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Nit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefono2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Correo_Electronico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Correo_electronico2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Direccion')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'Fecha_Nacimiento')->widget(DateTimePicker::className(), [
                                                                        'language' => 'es',
                                                                        'size' => 'ms',
                                                                        //'template' => '{input}',
                                                                        'pickButtonIcon' => 'glyphicon glyphicon-time',
                                                                        'inline' => false,
                                                                        'clientOptions' => [
                                                                          //'startView' => 1,
                                                                           // 'minView' => 0,
                                                                            //'maxView' => 1,
                                                                            'autoclose' => true,
                                                                            'linkFormat' => 'HH:ii P', // if inline = true
                                                                            // 'format' => 'HH:ii P', // if inline = false
                                                                            'todayBtn' => false
                                                                        ]]) ?>
    <br>

    
    <?= $form->field($model, 'Estado_civil')->widget(Select2::classname(),[
        'data' => [0 => 'Soltero/Soltera', 1 => 'Casado/Casada'],
        'options'=>['placeholder'=>'Seleccione estado civil'],
        'pluginOptions'=>['allowClear=>true'],
    ]) ?>

    <?= $form->field($model, 'Sexo')->widget(Select2::classname(),[
        'data' => [0 => 'Mujer', 1 => 'Hombre'],
        'options'=>['placeholder'=>'Seleccione su sexo'],
        'pluginOptions'=>['allowClear=>true'],
    ]) ?>

    <?= $form->field($model, 'No_licencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, "file")->fileInput(['multiple' => false]) ?>

    <?= $form->field($model, 'Profesion_id')->widget(Select2::classname(),[
        'data' => $profs,
        'options'=>['placeholder'=>'Seleccione la profesion'],
        'pluginOptions'=>['allowClear=>true'],
    ]) ?>
    <p>
    <?= Html::a(Yii::t('app', 'Registrar Nueva Profesion'), ['profesion/create','inv'=>1], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= $form->field($model, 'Cargo_id')->widget(Select2::classname(),[
        'data' => $cargs,
        'options'=>['placeholder'=>'Seleccione el Cargo'],
        'pluginOptions'=>['allowClear=>true'],
    ]) ?>
    <p>
    <?= Html::a(Yii::t('app', 'Registrar Nuevo Cargo'), ['cargo/create', 'inv'=>1], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= $form->field($model, 'Contratacion_id')->widget(Select2::classname(),[
        'data' => $conts,
        'options'=>['placeholder'=>'Seleccione el Contrato'],
        'pluginOptions'=>['allowClear=>true'],
    ]) ?>
    <p>
    <?= Html::a(Yii::t('app', 'Registrar Nuevo Contrato'), ['contratacion/create', 'inv'=>1], ['class' => 'btn btn-primary']) ?>
    </p>
   

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Regresar'), ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
