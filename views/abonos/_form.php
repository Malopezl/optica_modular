<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Abonos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="abonos-form">

    <?php $form = ActiveForm::begin(); ?>
<!--
    <?= $form->field($model, 'Cliente_id')->textInput() ?>
-->
    
    <?= $form->field($model, 'Nodocumento')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'Cantidad')->textInput() ?>

    <?= $form->field($model, 'Encargado')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Registrar'), ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Cancelar'), ['cliente/view','id' => $id], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
