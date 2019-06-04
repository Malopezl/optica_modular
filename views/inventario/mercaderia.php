<?php 
use yii\widgets\Pjax;
use yii\helpers\Html;

use yii\grid\GridView;
$this->title = Yii::t('app', 'Mercaderias');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['inventario/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventario-mercaderia">
     <h1><?= Html::encode($this->title) ?></h1>
     <hr>
     <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p><li><label>Lentes Semiterminados:</label></li></p>
    <p>
        <?= Html::a(Yii::t('app', 'Ingreso'), ['entrada/createinlst', 'id'=>0], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Salida'), ['salida/index'], ['class' => 'btn btn-primary']) ?>
     </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Graduacion_base',
            'Precio_compra',
            'Porcentaje_ganancia',
            'Existencia',
            //'Material_id',
            //'Tipo_id',
            //'Precio_venta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
     <hr>
     <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p><li><label>Lentes Terminados:</label></li></p>
    <p>
        <?= Html::a(Yii::t('app', 'Ingreso'), ['entrada/createinlt', 'id'=>0], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Salida'), ['salida/index'], ['class' => 'btn btn-primary']) ?>
     </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        'filterModel' => $searchModel1,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Graduacion_base',
            'Graduacion_excedente',
            //'Precio_compra',
            //'Porcentaje_ganancia',
            'Existencia',
            //'Material_id',
            //'Tipo_id',
            'Precio_venta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
    <hr>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p><li><label>Aro:</label></li></p>
    <p>
        <?= Html::a(Yii::t('app', 'Ingreso'), ['entrada/createinar', 'id'=>0], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Salida'), ['salida/index'], ['class' => 'btn btn-primary']) ?>
     </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        'filterModel' => $searchModel2,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'Precio_compra',
            'Porcentaje_ganancia',
            'Precio_venta',
            'Codigo',
            'Material_id',
            'Marca_id',
            'Existencia',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
     <hr>
     <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p><li><label>Accesorios:</label></li></p>
    <p>
        <?= Html::a(Yii::t('app', 'Ingreso'), ['entrada/createinacc', 'id'=>0], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Salida'), ['salida/index'], ['class' => 'btn btn-primary']) ?>
     </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider3,
        'filterModel' => $searchModel3,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Nombre',
            'Descripcion:ntext',
            'Precio_compra',
            'Existencia',
            //'Porcentaje_ganancia',
            'Precio_venta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>




