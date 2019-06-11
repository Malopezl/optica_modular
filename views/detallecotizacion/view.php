<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Detallecotizacion */

$this->title = 'Detalle Cotizacio';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas'), 'url' => ['cventas/index']];
if($inv == 1 )
{
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cotizacion'), 'url' => ['cotizacion/creates','id'=>$model->Cotizacion_id]];   
}
else if($inv == 2)
{
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cotizacion'), 'url' => ['cotizacion/view','id'=>$model->Cotizacion_id]];   
}
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="detallecotizacion-view">

    <h1><?= Html::encode($this->title) ?></h1>
<!--
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
-->
<p>
    <?php 
    if ($inv == 1)
    {
        echo Html::a(Yii::t('app', 'Regresar'), ['cotizacion/creates', 'id' => $model->Cotizacion_id], ['class' => 'btn btn-danger']);
    }
    else if($inv == 2)
    {
        echo Html::a(Yii::t('app', 'Regresar'), ['cotizacion/view', 'id' => $model->Cotizacion_id], ['class' => 'btn btn-danger']);
    }
    
    ?>
</p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'Cotizacion_id',
            //'Aro_id',
            //'Accesorios_id',
            //'Lentesterm_id',
            //'Lenteterm_id',
            'Total',
            'Cantidad',
            'Descuento',
        ],
    ]) ?>

</div>
