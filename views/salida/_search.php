<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SalidaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="salida-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Fecha') ?>

    <?= $form->field($model, 'Encargado') ?>

    <?= $form->field($model, 'Cantidad') ?>

    <?= $form->field($model, 'Mobyequipo_id') ?>

    <?php // echo $form->field($model, 'Lenteterm_id') ?>

    <?php // echo $form->field($model, 'Lentesterm_id') ?>

    <?php // echo $form->field($model, 'Accesorios_id') ?>

    <?php // echo $form->field($model, 'Aro_id') ?>

    <?php // echo $form->field($model, 'Nodocumento') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
