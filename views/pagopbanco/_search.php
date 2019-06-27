<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PagopbancoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pagopbanco-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'No_cheque') ?>

    <?= $form->field($model, 'Monto') ?>

    <?= $form->field($model, 'Nodocumento') ?>

    <?= $form->field($model, 'Empleado_id') ?>

    <?php // echo $form->field($model, 'Proveedores_id') ?>

    <?php // echo $form->field($model, 'Bancos_id') ?>

    <?php // echo $form->field($model, 'Fecha') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
