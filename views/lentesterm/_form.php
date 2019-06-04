<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Lentesterm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lentesterm-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Graduacion_base')->textInput() ?>

    <?= $form->field($model, 'Precio_compra')->textInput() ?>

    <?= $form->field($model, 'Porcentaje_ganancia')->textInput() ?>

    <?= $form->field($model, 'Existencia')->textInput() ?>

    <?= $form->field($model, 'Material_id')->textInput() ?>

    <?= $form->field($model, 'Tipo_id')->textInput() ?>

    <?= $form->field($model, 'Precio_venta')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
