<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pagopbanco */

$this->title = Yii::t('app', 'Registrar Pago Cheque');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pagopefectivos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Financiero'), 'url' => ['financiero/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proveedores'), 'url' => ['proveedores/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proveedor'), 'url' => ['proveedores/view','id' => $idp]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pagopbanco-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'idp' => $idp,
        'emps' => $emps,
        'bans' => $bans,
    ]) ?>

</div>
