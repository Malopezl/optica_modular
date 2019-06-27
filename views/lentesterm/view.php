<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Lentesterm */

$this->title = 'Lente Semi Terminado';
if($inv == 1)
{
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['inventario/index']];
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mercaderia'), 'url' => ['inventario/mercaderia']];
    $this->params['breadcrumbs'][] = $this->title;
}
\yii\web\YiiAsset::register($this);
?>
<div class="lentesterm-view">

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
            'Graduacion_base',
            'Precio_compra',
            'Porcentaje_ganancia',
            'Existencia',
            //'Material_id',
            //'Tipo_id',
            //'Precio_venta',
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
                //  'id',
                'Material',
             ],]);
        }
        ?>
         <p><li><label>Tipo:</label></li></p>
        <?php
        if($model->Tipo_id != null){
          echo  DetailView::widget([
            'model' => $model2,
            'attributes' => [
                //'id',
                'Tipo',
            ],
            ]);
        }
     ?>
     <?php
    if($inv == 1)
    {    
    echo Html::a(Yii::t('app', 'Regresar'), ['inventario/mercaderia'], ['class' => 'btn btn-primary']);
    }
?>
</div>
