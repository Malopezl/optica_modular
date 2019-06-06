<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materiala */

$this->title = Yii::t('app', 'Editar Material: {name}', [
    'name' => $model->Nombre,
]);
if($invo == 2 ){


$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['inventario/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalles'), 'url' => ['inventario/detalles']];
}
$this->params['breadcrumbs'][] = Yii::t('app', 'Editar');
?>
<div class="materiala-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'inv' => $inv,
        'invo' => $invo,
    ]) ?>

</div>
