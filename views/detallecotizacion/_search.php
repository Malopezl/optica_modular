<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetallecotizacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detallecotizacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Cotizacion_id') ?>

    <?= $form->field($model, 'Aro_id') ?>

    <?= $form->field($model, 'Accesorios_id') ?>

    <?= $form->field($model, 'Lentesterm_id') ?>

    <?php // echo $form->field($model, 'Lenteterm_id') ?>

    <?php // echo $form->field($model, 'Total') ?>

    <?php // echo $form->field($model, 'Cantidad') ?>

    <?php // echo $form->field($model, 'Descuento') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
