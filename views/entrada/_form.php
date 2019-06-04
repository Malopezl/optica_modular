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

    <?= $form->field($model, 'Encargado')->textInput(['maxlength' => true]) ?>
<!--
    <?= $form->field($model, 'Aro_id')->textInput() ?>

    <?= $form->field($model, 'Accesorios_id')->textInput() ?>

    <?= $form->field($model, 'Lentesterm_id')->textInput() ?>

    <?= $form->field($model, 'Lenteterm_id')->textInput() ?>
-->
    <?= $form->field($model, 'Mobyequipo_id')->widget(Select2::classname(),[
        'data' => $mobs,
        'options'=>['placeholder'=>'Seleccione el Accesorio'],
        'pluginOptions'=>['allowClear=>true'],
    ]) ?>

    <?= $form->field($model, 'Cantidad')->textInput() ?>

    <?= $form->field($model, 'Precio')->textInput() ?>

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

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Registrar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
