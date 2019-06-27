<?php

use yii\helpers\Html;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Bancos */

$this->title = Yii::t('app', 'Registro de Cuenta Bancaria');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Financiero'), 'url' => ['financiero/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cuentas'), 'url' => ['financiero/cuentas']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bancos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id,
        'nbns' => $nbns,
    ]) ?>

</div>
