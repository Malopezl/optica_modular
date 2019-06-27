<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProveedoresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proveedores-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'NIT') ?>

    <?= $form->field($model, 'Telefono') ?>

    <?= $form->field($model, 'Telefono2') ?>

    <?php // echo $form->field($model, 'Correo1') ?>

    <?php // echo $form->field($model, 'Correo2') ?>

    <?php // echo $form->field($model, 'Direccion') ?>

    <?php // echo $form->field($model, 'Saldo') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
