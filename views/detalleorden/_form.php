<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Detalleorden */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalleorden-form">

    <?php $form = ActiveForm::begin(); ?>


     <?php
    if($op == 3)
    {

    echo $form->field($model, 'Aro_id')->widget(Select2::classname(),[
        'data' => $aros,
        'options'=>['placeholder'=>'Seleccione el Aro'],
        'pluginOptions'=>['allowClear=>true'],
    ]);
    }
     ?>

    <?php
    if($op == 21)
    {

     echo $form->field($model, 'Lentesterm_id')->widget(Select2::classname(),[
        'data' => $lentes,
        'options'=>['placeholder'=>'Seleccione el lente'],
        'pluginOptions'=>['allowClear=>true'],
    ]);
    }
    else if($op == 11)
    {

     echo $form->field($model, 'Lentesterm_id')->widget(Select2::classname(),[
        'data' => $lentes,
        'options'=>['placeholder'=>'Seleccione el lente'],
        'pluginOptions'=>['allowClear=>true'],
    ]);
    }
      ?>

    <?php
    if($op == 12)
    {

    echo $form->field($model, 'Lenteterm_id')->widget(Select2::classname(),[
        'data' => $lentes1,
        'options'=>['placeholder'=>'Seleccione el lente'],
        'pluginOptions'=>['allowClear=>true'],
    ]);
    }
    else if($op == 22)
    {

    echo $form->field($model, 'Lenteterm_id')->widget(Select2::classname(),[
        'data' => $lentes1,
        'options'=>['placeholder'=>'Seleccione el lente'],
        'pluginOptions'=>['allowClear=>true'],
    ]);
    }
     ?>

    <?= $form->field($model, 'Descuento')->textInput() ?>

    <?= $form->field($model, 'Total')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Registrar'), ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Cancelar'), ['orden/creates', 'id' => $id,'reid' => $reid, 'liid' => $liid, 'ldid' => $ldid, 'arid'=>$arid, 'ido' => $ido], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
