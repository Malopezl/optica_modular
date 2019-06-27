<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Cargo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cargo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Sueldo_Base')->textInput() ?>

    <?= $form->field($model, 'Nivel_Acceso')->widget(Select2::classname(),[
        'data' => [	0 => 'Jefe Bodega',
        		1 => 'Asistente Bodega',
        		2 => 'Asistente Recursos Humanos',
        		3 => 'jefe Recursos Humanos',
        		4 => 'Vendedor',
        		5 => 'Asistente de Ventas',
        		6 => 'Supervisor de Ventas',
        		7 => 'Jefe de Contabilidad',
        		8 => 'Administrador',


        	],

        'options'=>['placeholder'=>'Seleccione nivel de acceso'],
        'pluginOptions'=>['allowClear=>true'],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Registrar'), ['class' => 'btn btn-success']) ?>
         <?= Html::a(Yii::t('app', 'Regresar'), ['rhumanos/detalles'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
