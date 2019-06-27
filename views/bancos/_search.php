<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BancosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bancos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'No_cuenta') ?>

    <?= $form->field($model, 'Total') ?>

    <?= $form->field($model, 'Nombre_b') ?>

    <?= $form->field($model, 'Tipo_cuenta') ?>

    <?php // echo $form->field($model, 'Bancosn_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
