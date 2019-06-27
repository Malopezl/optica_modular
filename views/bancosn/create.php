<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bancosn */
$this->title = Yii::t('app', 'Registro de Banco');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Financiero'), 'url' => ['financiero/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cuentas'), 'url' => ['financiero/cuentas']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Registro Cuenta Bancaria'), 'url' => ['bancos/creates', 'id' => 0]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bancosn-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
