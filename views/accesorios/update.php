<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Accesorios */

$this->title = Yii::t('app', 'Editar Informacion Accesorio', [
    'name' => $model->id,
]);
if($inv == 1)
{
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['inventario/index']];
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mercaderia'), 'url' => ['inventario/mercaderia']];
    $this->params['breadcrumbs'][] = $this->title;
}
?>
<div class="accesorios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'inv' => $inv,
    ]) ?>

</div>
