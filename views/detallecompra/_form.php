<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Detallecompra */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detallecompra-form">

    <?php $form = ActiveForm::begin(); ?>

<!--
    <?= $form->field($model, 'Total')->textInput() ?>
-->
    <?php
    if($op == 1)
    {
        echo $form->field($model, 'Lenteterm_id')->widget(Select2::classname(),[
        'data' => $lentes1,
        'options'=>['placeholder'=>'Seleccione Lente Terminado'],
        'pluginOptions'=>['allowClear=>true'],
    ]);
        echo Html::a(Yii::t('app', 'Registrar Nuevo Producto'), ['lenteterm/createc', 'inv'=>3, 'ido' => $id, 'op'=> $op], ['class' => 'btn btn-primary']);
    }
    else if($op == 2)
    {
        echo $form->field($model, 'Lentesterm_id')->widget(Select2::classname(),[
        'data' => $lentes,
        'options'=>['placeholder'=>'Seleccione Lente Semiterminado'],
        'pluginOptions'=>['allowClear=>true'],
    ]);
        echo Html::a(Yii::t('app', 'Registrar Nuevo Producto'), ['lentesterm/createc', 'inv'=>3, 'ido' => $id, 'op'=> $op], ['class' => 'btn btn-primary']);
    }else if($op == 4)
    {
        echo $form->field($model, 'Accesorios_id')->widget(Select2::classname(),[
        'data' => $acces,
        'options'=>['placeholder'=>'Seleccione el Accesorio'],
        'pluginOptions'=>['allowClear=>true'],
    ]); 
        echo Html::a(Yii::t('app', 'Registrar Nuevo Producto'), ['accesorios/createc', 'inv'=>3, 'ido' => $id, 'op'=> $op], ['class' => 'btn btn-primary']);
    }else if($op == 3)
    {
        echo $form->field($model, 'Aro_id')->widget(Select2::classname(),[
        'data' => $aros,
        'options'=>['placeholder'=>'Seleccione el Aro'],
        'pluginOptions'=>['allowClear=>true'],
    ]);
        echo Html::a(Yii::t('app', 'Registrar Nuevo Producto'), ['aro/createc', 'inv'=>3, 'ido' => $id, 'op'=> $op], ['class' => 'btn btn-primary']);
    }else if($op == 5)
    {
        echo $form->field($model, 'Mobyequipo_id')->widget(Select2::classname(),[
        'data' => $acces,
        'options'=>['placeholder'=>'Seleccione el Accesorio'],
        'pluginOptions'=>['allowClear=>true'],
    ]);
        echo Html::a(Yii::t('app', 'Registrar Nuevo Producto'), ['aro/create', 'inv'=>3, 'ido' => $id, 'op'=> $op ], ['class' => 'btn btn-primary']);
    }
    
    ?>
<p>
    <?= $form->field($model, 'Cantidad')->textInput() ?>
</p>
    <?= $form->field($model, 'Precio_compra')->textInput() ?>
<!--
    <?= $form->field($model, 'Compras_id')->textInput() ?>
-->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Registrar'), ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Regresar'), ['compras/creates', 'id' => $id], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
