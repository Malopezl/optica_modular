<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bancos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bancos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'No_cuenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Total')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Nombre_b')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Tipo_cuenta')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
