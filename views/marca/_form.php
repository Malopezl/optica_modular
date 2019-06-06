<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Marca */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="marca-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Registrar'), ['class' => 'btn btn-success']) ?>
        <?php 
        	if($invo == 1)
        	{
        	 	echo Html::a(Yii::t('app', 'Cancelar'), ['aro/create', 'inv'=>$invo], ['class' => 'btn btn-danger']);
        	}
            else if($invo == 2)
            {
                echo Html::a(Yii::t('app', 'Cancelar'), ['inventario/detalles'], ['class' => 'btn btn-danger']);
            }
         ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
