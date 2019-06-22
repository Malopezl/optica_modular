<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datetimepicker\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Entrada */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entrada-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nodocumento')->textInput(['maxlength' => true]) ?>

   <?= $form->field($model, 'Empleado_id')->widget(Select2::classname(),[
        'data' => $emps,
        'options'=>['placeholder'=>'Seleccione al Encargado'],
        'pluginOptions'=>['allowClear=>true'],
    ]) ?>
<!--
    <?= $form->field($model, 'Encargado')->textInput(['maxlength' => true]) ?>
-->

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
    <br>

    <?= $form->field($model, 'Lentesterm_id')->widget(Select2::classname(),[
        'data' => $lentes,
        'options'=>['placeholder'=>'Seleccione el lente'],
        'pluginOptions'=>['allowClear=>true'],
    ]) ?>
    <p>
    <?= Html::a(Yii::t('app', 'Registrar Nuevo Producto'), ['lentesterm/create', 'inv'=>1], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= $form->field($model, 'Cantidad')->textInput() ?>

    <?= $form->field($model, 'Precio')->textInput() ?>

 
<!--
   <?= $form->field($model, 'Lenteterm_id')->textInput() ?>
   <?= $form->field($model, 'Aro_id')->textInput() ?>
    <?= $form->field($model, 'Accesorios_id')->textInput() ?>
<?= $form->field($model, 'Mobyequipo_id')->textInput() ?>
-->
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Registrar'), ['class' => 'btn btn-success']) ?>
         <?= Html::a(Yii::t('app', 'Cancelar'), ['inventario/mercaderia'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
