

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Orden */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orden-form">

    <?php $form = ActiveForm::begin(); ?>
<!--
   

   
	<?= $form->field($model, 'Venta_id')->textInput() ?>

     <?= $form->field($model, 'Lista')->textInput() ?>

    <?= $form->field($model, 'Total')->textInput() ?>

    <?= $form->field($model, 'No_Caja')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Finalizada')->textInput() ?>

    
    <?= $form->field($model, 'Entregada')->textInput() ?>

-->

	 <?php
	 if($model->Receta_id == null)
	 {
	 	echo Html::a(Yii::t('app', 'Registrar Receta'), ['receta/create', 'id' => $model->id,'reid' => $reid, 'liid' => $liid, 'ldid' => $ldid, 'arid'=>$arid, 'ido' => $ido], ['class' => 'btn btn-primary']);
	 }
	 else
	 {
	 	echo $form->field($model, 'Receta_id')->textInput();
	 }

	?>

    <?php 
    	if($model->Lentei_id == null)
    	{
	 		echo Html::a(Yii::t('app', 'Agregar Lente Izquierdo/Semiterminado'), ['detalleorden/create', 'id' => $model->id,'reid' => $reid, 'liid' => $liid, 'ldid' => $ldid, 'arid'=>$arid, 'ido' => $ido, 'op' => 11], ['class' => 'btn btn-primary']);
	 		echo "  ";
	 		echo Html::a(Yii::t('app', 'Agregar Lente Izquierdo/Terminado'), ['detalleorden/create', 'id' => $model->id,'reid' => $reid, 'liid' => $liid, 'ldid' => $ldid, 'arid'=>$arid, 'ido' => $ido, 'op' => 12], ['class' => 'btn btn-primary']);
    	}
    	else
    	{
    		echo $form->field($model, 'Lentei_id')->textInput();
    	}
     ?>

    <?php 
    	if ($model->Lented_id == null)
    	{
    		echo Html::a(Yii::t('app', 'Agregar Lente Derecho/ Semiterminado'), ['detalleorden/create', 'id' => $model->id,'reid' => $reid, 'liid' => $liid, 'ldid' => $ldid, 'arid'=>$arid, 'ido' => $ido, 'op' => 21], ['class' => 'btn btn-primary']);
    		echo "  ";
    		echo Html::a(Yii::t('app', 'Agregar Lente Derecho/ Temiterminado'), ['detalleorden/create', 'id' => $model->id,'reid' => $reid, 'liid' => $liid, 'ldid' => $ldid, 'arid'=>$arid, 'ido' => $ido, 'op' => 22], ['class' => 'btn btn-primary']);
    	}
    	else
    	{
    		echo $form->field($model, 'Lented_id')->textInput();
    	}
    ?>

    <?php 
     if($model->Aro_id == null)
     {
     	echo Html::a(Yii::t('app', 'Agregar Aro'), ['detalleorden/create', 'id' => $model->id,'reid' => $reid, 'liid' => $liid, 'ldid' => $ldid, 'arid'=>$arid, 'ido' => $ido, 'op' => 3], ['class' => 'btn btn-primary']);
     }
     else
     {
     	echo $form->field($model, 'Aro_id')->textInput();
     }
     ?>
     <br>
    <?= $form->field($model, 'Fecha_Entrega')->widget(DateTimePicker::className(), [
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
    
    <?= $form->field($model, 'Anotaciones')->textarea(['rows' => 6]) ?>

  	<?= $form->field($model, 'Descuento')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Registrar'), ['class' => 'btn btn-success']) ?>
         <?= Html::a(Yii::t('app', 'Cancelar'), ['venta/creates','id'=> $id], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
