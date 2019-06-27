<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetallecompraSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detallecompra-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Cantidad') ?>

    <?= $form->field($model, 'Precio_compra') ?>

    <?= $form->field($model, 'Total') ?>

    <?= $form->field($model, 'Lenteterm_id') ?>

    <?php // echo $form->field($model, 'Lentesterm_id') ?>

    <?php // echo $form->field($model, 'Accesorios_id') ?>

    <?php // echo $form->field($model, 'Aro_id') ?>

    <?php // echo $form->field($model, 'Compras_id') ?>

    <?php // echo $form->field($model, 'Mobyequipo_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
