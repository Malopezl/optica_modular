<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contratacion */

$this->title = Yii::t('app', 'Nueva Contratación');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recursos Humanos'), 'url' => ['rhumanos/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contrataciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contratacion-create">

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
    <?= Html::a(Yii::t('app', 'Guardar'), ['view', 'id' => $id], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
    
    </p>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'Fechai',
            'Fechaf',
            'Contrato',
            //'Encargado_id',
            //'Descuento',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view}',
            'buttons'=>[
             'view' => function ($url, $model) {
                $url = '/contratacion/view?id='.$model->id.'&inv=1&idi='.$model->Cotizacion_id;
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' =>'Ver'
                ]);
            },
            'update' => function ($url, $model) {
                $url = '/contratacion/update?id='.$model->id.'&inv=1';
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'Editar'),
                ]);
            },
          ],],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
