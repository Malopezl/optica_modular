<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Entrada */

$this->title = Yii::t('app', 'Registro de Ingreso');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['inventario/index']];
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mercaderia'), 'url' => ['inventario/mercaderia']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="entrada-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_forminlst', [
        'model' => $model,
        'lentes'=> $lentes,
        'emps' => $emps,
    ]) ?>

</div>
