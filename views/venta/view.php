<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\models\Venta */

$this->title = $model->id;

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas'), 'url' => ['cventas/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="venta-view">

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
     <?= Html::a(Yii::t('app', 'Regresar'), ['index'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'Nodocumento',
            'Fecha',
            'Total',
            'Credito',
            'Contado',
            'Cliente_id',
            'Encargado',
            'Finalizada',
            'Entregada',
            'Empleado_id',
        ],
    ]) ?>
    <?php Pjax::begin(); ?>
    <p>
    <?php //echo $this->render('_search', ['model' => $searchModel]); 
    echo Html::tag('h3', Html::encode('Ordenes'), ['class' => 'et1']);
        ?>
        </p>
    <?php
        
        echo  GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [ 
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            //'Receta_id',
            //'Lentei_id',
            //'Lented_id',
            //'Aro_id',
            'No_Caja',
            //'Venta_id',
            'Fecha_Entrega',
            'Anotaciones:ntext',
            //'Descuento',
            //'Entregada',
            //'Lista',
            'Total',
            //'Finalizada',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view}',
            'buttons'=>[
             'view' => function ($url, $model) {
                $url = '/orden/view?id='.$model->id.'&inv=1&idi='.$model->Venta_id;
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' =>'Ver'
                ]);
            },
            'update' => function ($url, $model) {
                $url = '/lentesterm/update?id='.$model->id.'&inv=1';
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'Editar'),
                ]);
            },
          ],],
        ],
    ]); ?>
   
    <?php Pjax::end(); ?>
     <br>
    <?php Pjax::begin(); ?>
    <p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
       echo Html::tag('h3', Html::encode('Productos Individuales'), ['class' => 'et1']);?>
</p>
    <?php
    
    echo GridView::widget([
        'dataProvider' => $dataProvider1,
        'filterModel' => $searchModel1,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Cantidad',
            //'Venta_id',
            //'Accesorios_id',
            //'Aro_id',
            'Descuento',
            'Total',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view}',
            'buttons'=>[
             'view' => function ($url, $model) {
                $url = '/detalleventa/view?id='.$model->id.'&inv=1&idi='.$model->Venta_id;
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' =>'Ver'
                ]);
            },
            'update' => function ($url, $model) {
                $url = '/lentesterm/update?id='.$model->id.'&inv=1';
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'Editar'),
                ]);
            },
          ],],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
