<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MobyequipoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mobyequipo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?= $form->field($model, 'fechaCompra') ?>

    <?= $form->field($model, 'Precio_compra') ?>

    <?= $form->field($model, 'Existencia') ?>

    <?php // echo $form->field($model, 'Depreciacion_id') ?>

    <?php // echo $form->field($model, 'Precio_venta') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
