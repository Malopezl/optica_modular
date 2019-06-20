<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Salida */

$this->title = Yii::t('app', 'Registrar Salida');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['inventario/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mercaderia'), 'url' => ['inventario/mercaderia']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salida-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_forminlt', [
        'model' => $model,
        'lentes' => $lentes
    ]) ?>

</div>
