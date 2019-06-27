<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datetimepicker\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Compras */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compras-form">

    <?php $form = ActiveForm::begin(); ?>
    <!--
    <?= $form->field($model, 'Empleado_id')->widget(Select2::classname(),[
        'data' => $emps,
        'options'=>['placeholder'=>'Seleccione el Empleado'],
        'pluginOptions'=>['allowClear=>true'],
    ]) ?>

    <?= $form->field($model, 'Proveedores_id')->widget(Select2::classname(),[
        'data' => $provs,
        'options'=>['placeholder'=>'Seleccione Proveedor'],
        'pluginOptions'=>['allowClear=>true'],
    ]) ?>
    <p>
    <?= Html::a(Yii::t('app', 'Registrar Nuevo Proveedor'), ['proveedores/create', 'inv'=>1], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= $form->field($model, 'Fecha')->widget(DateTimePicker::className(), [
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
                                                                            'todayBtn' => true
                                                                        ]]) ?>

    <?= $form->field($model, 'Nodocumeto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Total')->textInput() ?>
     <?= $form->field($model, 'Comprascol')->textInput(['maxlength' => true]) ?>
    -->
    
     <p>
    <?php 
        echo Html::tag('h3', Html::encode('Total: '.$model->Total), ['class' => 'et1']);
        ?>
        </p>
    <?= $form->field($model, 'Contado')->textInput() ?>

    <?= $form->field($model, 'Credito')->textInput() ?>

   

    

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Finalizar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
