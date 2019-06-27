<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RecetaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Fecha') ?>

    <?= $form->field($model, 'Esfera_OD') ?>

    <?= $form->field($model, 'Esfera_OI') ?>

    <?= $form->field($model, 'Eje_OD') ?>

    <?php // echo $form->field($model, 'Eje_OI') ?>

    <?php // echo $form->field($model, 'Cilindro_OD') ?>

    <?php // echo $form->field($model, 'Cilindro_OI') ?>

    <?php // echo $form->field($model, 'Adicion_OD') ?>

    <?php // echo $form->field($model, 'Adicion_OI') ?>

    <?php // echo $form->field($model, 'Cliente_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
