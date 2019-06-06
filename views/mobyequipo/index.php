<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MobyequipoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Mobiliario y Equipo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['inventario/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mobyequipo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Ingreso'), ['create','inv' => 1], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Descripcion:ntext',
            'fechaCompra',
            'Precio_compra',
            'Existencia',
            [
            'attribute' => 'nombre',
            'value' => 'depreciacion.Nombre'
            ],
            [
            'attribute' => 'porcentaje',
            'value' => 'depreciacion.porcentaje'
            ],
            //'Depreciacion_id',
            //'Precio_venta',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view}',
            'buttons'=>[
             'view' => function ($url, $model) {
                $url = '/mobyequipo/view?id='.$model->id.'&inv=1';
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' =>'Ver'
                ]);
            },
            'update' => function ($url, $model) {
                $url = '/mobyequipo/update?id='.$model->id.'&inv=1';
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'Editar'),
                ]);
            },
          ],],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
    <p>
        
        <?= Html::a(Yii::t('app', 'Inicio'), ['inventario/index'], ['class' => 'btn btn-danger']) ?>
    </p>
</div>
