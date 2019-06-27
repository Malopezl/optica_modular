<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmpleadoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empleado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Nit') ?>

    <?= $form->field($model, 'Telefono') ?>

    <?= $form->field($model, 'Telefono2') ?>

    <?php // echo $form->field($model, 'Correo_Electronico') ?>

    <?php // echo $form->field($model, 'Correo_electronico2') ?>

    <?php // echo $form->field($model, 'Direccion') ?>

    <?php // echo $form->field($model, 'Fecha_Nacimiento') ?>

    <?php // echo $form->field($model, 'Edad') ?>

    <?php // echo $form->field($model, 'Estado_civil') ?>

    <?php // echo $form->field($model, 'No_licencia') ?>

    <?php // echo $form->field($model, 'Cv') ?>

    <?php // echo $form->field($model, 'Profesion_id') ?>

    <?php // echo $form->field($model, 'Cargo_id') ?>

    <?php // echo $form->field($model, 'Contratacion_id') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
