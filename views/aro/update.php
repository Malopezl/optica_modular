<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aro */

$this->title = Yii::t('app', 'Editar Informacion Aro', [
    'name' => $model->id,
]);
if($inv == 1)
{
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['inventario/index']];
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mercaderia'), 'url' => ['inventario/mercaderia']];
    $this->params['breadcrumbs'][] = $this->title;
}
?>
<div class="aro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
            'mats'=> $mats,
            'mars' => $mars,
            'inv' => $inv,
    ]) ?>

</div>
