<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Orden */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orden-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Receta_id')->textInput() ?>

    <?= $form->field($model, 'Lentei_id')->textInput() ?>

    <?= $form->field($model, 'Lented_id')->textInput() ?>

    <?= $form->field($model, 'Aro_id')->textInput() ?>

    <?= $form->field($model, 'No_Caja')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Venta_id')->textInput() ?>

    <?= $form->field($model, 'Fecha_Entrega')->textInput() ?>

    <?= $form->field($model, 'Anotaciones')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Descuento')->textInput() ?>

    <?= $form->field($model, 'Entregada')->textInput() ?>

    <?= $form->field($model, 'Lista')->textInput() ?>

    <?= $form->field($model, 'Total')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
