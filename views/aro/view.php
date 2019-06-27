<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Aro */
$this->title = 'Aros';
if($inv == 1)
{
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['inventario/index']];
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mercaderia'), 'url' => ['inventario/mercaderia']];
    $this->params['breadcrumbs'][] = $this->title;
}
\yii\web\YiiAsset::register($this);
?>
<div class="aro-view">

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
    <?php 
     echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'Precio_compra',
            'Porcentaje_ganancia',
            'Precio_venta',
            'Codigo',
            //'Material_id',
            //'Marca_id',
            'Existencia',
        ],
    ]);
    ?>
     <p><li><label>Material:</label></li></p>
     <?php
   if($model->Material_id != null)
   {
     echo DetailView::widget([
        'model' => $model1,
        'attributes' => [
         //   'id',
            'Nombre',
        ],
    ]); 
   }
   ?>
    <p><li><label>Marca:</label></li></p>
    <?php
   if($model->Marca_id != null)
   {
    
    echo DetailView::widget([
        'model' => $model2,
        'attributes' => [
           // 'id',
            'Nombre',
        ],
    ]) ;
   }
    ?>
    <?php
    if($inv == 1)
    {    
    echo Html::a(Yii::t('app', 'Regresar'), ['inventario/mercaderia'], ['class' => 'btn btn-primary']);
    }
    ?>

</div>
