<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrdenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orden-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Receta_id') ?>

    <?= $form->field($model, 'Lentei_id') ?>

    <?= $form->field($model, 'Lented_id') ?>

    <?= $form->field($model, 'Aro_id') ?>

    <?php // echo $form->field($model, 'No_Caja') ?>

    <?php // echo $form->field($model, 'Venta_id') ?>

    <?php // echo $form->field($model, 'Fecha_Entrega') ?>

    <?php // echo $form->field($model, 'Anotaciones') ?>

    <?php // echo $form->field($model, 'Descuento') ?>

    <?php // echo $form->field($model, 'Entregada') ?>

    <?php // echo $form->field($model, 'Lista') ?>

    <?php // echo $form->field($model, 'Total') ?>

    <?php // echo $form->field($model, 'Finalizada') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
