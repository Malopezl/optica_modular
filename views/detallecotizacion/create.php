<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Detallecotizacion */
if($op == 1 )
{
$this->title = Yii::t('app', 'Lente Terminado');
}
else if($op == 2)
{
$this->title = Yii::t('app', 'Agregar Lente Semiterminado');
}
else if($op == 3)
{
$this->title = Yii::t('app', 'Agregar Aro');
}
else if($op == 4)
{
$this->title = Yii::t('app', 'Agregar Accesorio');
}

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas')];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cotizaciones')];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cotizacion'), 'url' => ['creates', 'id' => $id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallecotizacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id,
        'op' => $op,
        'lentes'=> $lentes,
         'lentes1'=> $lentes1,
            'aros'=> $aros,
            'acces'=> $acces,
    ]) ?>

</div>
