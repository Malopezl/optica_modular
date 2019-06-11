<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\models\Cotizacion */

$this->title = Yii::t('app', 'Agregar Productos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas')];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cotizaciones')];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cotizacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formcs', [
        'model' => $model,
    ]) ?>
    <p>
    	
    	
    	
    	
    </p>
    <p>
    <?= Html::a(Yii::t('app', 'Cancelar'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Esta seguro?'),
                'method' => 'post',
            ],
        ]) ?>
    <?= Html::a(Yii::t('app', 'Finalizar'), ['view', 'id' => $id], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
    	<?= Html::a(Yii::t('app', 'Agregar Lente Terminado'), ['detallecotizacion/create', 'id' => $id, 'op' => 1], ['class' => 'btn btn-primary']) ?>
    	 	<?= Html::a(Yii::t('app', 'Agregar Lente Semiterminado'), ['detallecotizacion/create', 'id' => $id, 'op' => 2], ['class' => 'btn btn-primary']) ?>
    	 	<?= Html::a(Yii::t('app', 'Agregar Aro'), ['detallecotizacion/create', 'id' => $id, 'op' => 3], ['class' => 'btn btn-primary']) ?>
    	 	<?= Html::a(Yii::t('app', 'Agregar Accesorio'), ['detallecotizacion/create', 'id' => $id, 'op' => 4], ['class' => 'btn btn-primary']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'Cotizacion_id',
            'Aro_id',
            'Accesorios_id',
            'Lentesterm_id',
            'Lenteterm_id',
            'Total',
            //'Cantidad',
            //'Descuento',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view}',
            'buttons'=>[
             'view' => function ($url, $model) {
                $url = '/detallecotizacion/view?id='.$model->id.'&inv=1&idi='.$model->Cotizacion_id;
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
