<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleordenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalleorden-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Aro_id') ?>

    <?= $form->field($model, 'Lentesterm_id') ?>

    <?= $form->field($model, 'Lenteterm_id') ?>

    <?= $form->field($model, 'Descuento') ?>

    <?php // echo $form->field($model, 'Total') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
