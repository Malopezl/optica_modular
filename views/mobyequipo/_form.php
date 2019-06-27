<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datetimepicker\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Mobyequipo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mobyequipo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fechaCompra')->widget(DateTimePicker::className(), [
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

    <?= $form->field($model, 'Precio_compra')->textInput() ?>


    <?= $form->field($model, 'Depreciacion_id')->widget(Select2::classname(),[
        'data' => $deps,
        'options'=>['placeholder'=>'Seleccione el Accesorio'],
        'pluginOptions'=>['allowClear=>true'],
    ]) ?>
    <p>
    <?= Html::a(Yii::t('app', 'Registrar Nuevo Tipo de Producto'), ['depreciacion/create', 'inv'=>1], ['class' => 'btn btn-primary']) ?>
    </p>
<!--
        <?= $form->field($model, 'Existencia')->textInput() ?>

    <?= $form->field($model, 'Precio_venta')->textInput() ?>
-->
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Registrar'), ['class' => 'btn btn-success']) ?>
        <?php 
            if($inv == 1)
            {
                echo Html::a(Yii::t('app', 'Cancelar'), ['mobyequipo/index'], ['class' => 'btn btn-danger']);
            }
         ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
