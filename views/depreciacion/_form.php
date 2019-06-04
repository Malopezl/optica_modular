<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Depreciacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="depreciacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'porcentaje')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Registrar'), ['class' => 'btn btn-success']) ?>
         <?php 
        	if($inv == 1)
        	{
        	 	echo Html::a(Yii::t('app', 'Cancelar'), ['mobyequipo/create', 'inv'=>$inv], ['class' => 'btn btn-danger']);
        	}
         ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
