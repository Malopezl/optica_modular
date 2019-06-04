<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tipo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tipo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Tipo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Registrar'), ['class' => 'btn btn-success']) ?>
        <?php
        	if($inv == 1)
        	{
        	 echo Html::a(Yii::t('app', 'Cancelar'), ['lentesterm/create', 'inv'=>$invo], ['class' => 'btn btn-danger']);
        	}
        	else if($inv == 2)
        	{
        		echo Html::a(Yii::t('app', 'Cancelar'), ['lenteterm/create', 'inv'=>$invo], ['class' => 'btn btn-danger']);
        	}

         ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
