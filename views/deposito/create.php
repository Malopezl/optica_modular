<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Deposito */

$this->title = Yii::t('app', 'Registro Deposito');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Financiero'), 'url' => ['financiero/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cuentas'), 'url' => ['financiero/cuentas']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deposito-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
            'nbns' => $nbns,
            'emps' => $emps,
    ]) ?>

</div>
