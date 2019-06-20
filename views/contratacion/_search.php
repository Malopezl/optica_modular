<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ContratacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contratacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Encargado_id') ?>

    <?= $form->field($model, 'Fechai') ?>

    <?= $form->field($model, 'Fechaf') ?>

    <?= $form->field($model, 'Contrato') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>

    <?php ActiveForm::end(); ?>

</div>
