<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Bancos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bancos-form">

    <?php $form = ActiveForm::begin(); ?>

<!--
    <?= $form->field($model, 'Nombre_b')->textInput(['maxlength' => true]) ?>
-->
    <?= $form->field($model, 'Bancosn_id')->widget(Select2::classname(),[
        'data' => $nbns,
        'options'=>['placeholder'=>'Seleccione el Banco'],
        'pluginOptions'=>['allowClear=>true'],
    ]) ?>


    <p>
        <?= Html::a(Yii::t('app', 'Registrar Nombre de Banco'), ['bancosn/create'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= $form->field($model, 'Tipo_cuenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'No_cuenta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Total')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Registrar'), ['class' => 'btn btn-success']) ?>

        <?= Html::a(Yii::t('app', 'Regresar'), ['financiero/cuentas'], ['class' => 'btn btn-danger']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
