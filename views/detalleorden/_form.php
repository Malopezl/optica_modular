<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Detalleorden */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalleorden-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Aro_id')->textInput() ?>

    <?= $form->field($model, 'Lentesterm_id')->textInput() ?>

    <?= $form->field($model, 'Lenteterm_id')->textInput() ?>

    <?= $form->field($model, 'Descuento')->textInput() ?>

    <?= $form->field($model, 'Total')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
