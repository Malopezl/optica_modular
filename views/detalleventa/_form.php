<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Detalleventa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalleventa-form">

    <?php $form = ActiveForm::begin(); ?>
      <?php 
    if($op == 2 )
        {
            echo $form->field($model, 'Accesorios_id')->widget(Select2::classname(),[
        'data' => $acces,
        'options'=>['placeholder'=>'Seleccione el Accesorio'],
        'pluginOptions'=>['allowClear=>true'],
    ]);
        }
        ?>

    <?php 
        if ($op == 1)
        {
            echo  $form->field($model, 'Aro_id')->widget(Select2::classname(),[
        'data' => $aros,
        'options'=>['placeholder'=>'Seleccione el Aro'],
        'pluginOptions'=>['allowClear=>true'],
    ]) ;
        } 
     ?>
     
    <?= $form->field($model, 'Cantidad')->textInput() ?>
<!--
    <?= $form->field($model, 'Venta_id')->textInput() ?>

    <?= $form->field($model, 'Total')->textInput() ?>
-->


    <?= $form->field($model, 'Descuento')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Agregar'), ['class' => 'btn btn-success']) ?>
         <?= Html::a(Yii::t('app', 'Cancelar'), ['venta/creates','id'=> $id], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
