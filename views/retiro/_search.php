<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RetiroSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="retiro-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Fecha') ?>

    <?= $form->field($model, 'Nodocumento') ?>

    <?= $form->field($model, 'Monto') ?>

    <?= $form->field($model, 'Bancos_id') ?>

    <?php // echo $form->field($model, 'Empleado_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
