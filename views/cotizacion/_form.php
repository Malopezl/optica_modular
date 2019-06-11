<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cotizacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cotizacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nodocumento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Encargado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Detalles')->textarea(['rows' => 6]) ?>
<!--

    <?= $form->field($model, 'Fecha')->textInput() ?>

    <?= $form->field($model, 'Total')->textInput() ?>

-->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Siguiente'), ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Cancelar'), ['cotizacion/index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
