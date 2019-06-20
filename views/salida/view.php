<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Salida */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['inventario/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Entradas y Salidas'), 'url' => ['inventario/ingeg']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="salida-view">

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
    <?php echo Html::a(Yii::t('app', 'Regresar'), ['inventario/ingeg'], ['class' => 'btn btn-primary']); ?>
 </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
             'Nodocumento',
            'Fecha',
            'Encargado',
            'Cantidad',
            //'Mobyequipo_id',
            //'Lenteterm_id',
            //'Lentesterm_id',
            //'Accesorios_id',
            //'Aro_id',
           
        ],
    ]) ?>
     <p><li><label>Aro:</label></li></p>
    <?php 
    if($model->Aro_id != null)
    {
        echo DetailView::widget([
        'model' => $model4,
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
        echo DetailView::widget([
        'model' => $model41,
        'attributes' => [
         //   'id',
            'Nombre',
        ],
    ]); 
        echo DetailView::widget([
        'model' => $model42,
        'attributes' => [
           // 'id',
            'Nombre',
        ],
    ]) ;
    }
    ?>
    <p><li><label>Accesorio:</label></li></p>
    <?php 
    if($model->Accesorios_id != null)
    {
        echo DetailView::widget([
        'model' => $model3,
        'attributes' => [
            //'id',
            'Nombre',
            'Descripcion:ntext',
            'Precio_compra',
            'Existencia',
            //'Porcentaje_ganancia',
            'Precio_venta',
        ],
        ]) ;

    }
    ?>
    <p><li><label>Lente Semiterminado:</label></li></p>
    <?php 
    if($model->Lentesterm_id != null)
    {
        echo DetailView::widget([
        'model' => $model2,
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
        echo DetailView::widget([
                'model' => $model21,
                'attributes' => [
                //  'id',
                'Material',
             ],]);
         echo  DetailView::widget([
            'model' => $model22,
            'attributes' => [
                //'id',
                'Tipo',
            ],
            ]);
    }
    ?>
    <p><li><label>Lente Terminado:</label></li></p>
    <?php 
    if($model->Lenteterm_id != null)
    {
        echo DetailView::widget([
        'model' => $model1,
        'attributes' => [
            //'id',
            'Graduacion_base',
            'Graduacion_excedente',
            'Precio_compra',
            'Porcentaje_ganancia',
            'Existencia',
           // 'Material_id',
            //'Tipo_id',
            //'Precio_venta',
        ],
    ]);
         echo DetailView::widget([
                'model' => $model11,
                'attributes' => [
                //  'id',
                'Material',
             ],]);
         echo  DetailView::widget([
            'model' => $model12,
            'attributes' => [
                //'id',
                'Tipo',
            ],
            ]);
    }
    ?>
    <p><li><label>Mobiliario y Equipo:</label></li></p>
    <?php 
    if($model->Mobyequipo_id != null)
    {
        echo DetailView::widget([
        'model' => $model5,
        'attributes' => [
            //'id',
            'Descripcion:ntext',
            'fechaCompra',
            'Precio_compra',
            'Existencia',
            //'Depreciacion_id',
            'Precio_venta',
        ],
    ]);
    }
    ?>

</div>
