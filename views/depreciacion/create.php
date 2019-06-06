<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Depreciacion */

$this->title = Yii::t('app', 'Create Depreciacion');
if($inv == 1)
{
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Moviliario y Equipo'), 'url' => ['mobyequipo/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Registro de Mobiliario'), 'url' => ['mobyequipo/create', 'inv'=>1]];
$this->params['breadcrumbs'][] = $this->title;
}
else if($inv == 2)
{
	
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['inventario/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalles'), 'url' => ['inventario/detalles']];
$this->params['breadcrumbs'][] = $this->title;
}
?>
<div class="depreciacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'inv' => $inv,
    ]) ?>

</div>
