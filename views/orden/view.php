<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Orden */

$this->title = $model->id;
if($inv == 1)
{
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas'), 'url' => ['cventas/index']];
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas'), 'url' => ['venta/index']];
     $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ver Venta'), 'url' => ['venta/view', 'id'=> $idi]];
}
else if($inv ==2 )
{
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas')];
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Venta')];
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalle Venta'), 'url' => ['venta/creates', 'id'=> $idi]];
}

$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="orden-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
<!--
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>

--> 
    <?php 
    if($inv == 1)
    {
        echo Html::a(Yii::t('app', 'Regresar'), ['venta/view', 'id'=> $idi], ['class' => 'btn btn-danger']); 
    }
    else if ($inv == 2 ) 
    {
        echo Html::a(Yii::t('app', 'Regresar'), ['venta/creates', 'id'=> $idi], ['class' => 'btn btn-danger']); 
    }
    ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'Receta_id',
            //'Lentei_id',
            //'Lented_id',
            //'Aro_id',
            'No_Caja',
            //'Venta_id',
            'Fecha_Entrega',
            'Anotaciones:ntext',
            'Descuento',
            //'Entregada',
            //'Lista',
            'Total',
            //'Finalizada',
        ],
    ]) ?>

</div>
