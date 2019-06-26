<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DepreciacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Detalles');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['inventario/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventario-detalles">

    <h1><?= Html::encode($this->title) ?></h1>
 	<?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p><li><label>Marcas de Aros:</label></li></p>
    <p>
        <?= Html::a(Yii::t('app', 'Registro'), ['marca/create', 'inv'=>0,'invo'=>2,'op'=> 0, 'ido'=>0], ['class' => 'btn btn-primary']) ?>
     </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Nombre',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view} {update}',
            'buttons'=>[
             'view' => function ($url, $model) {
                $url = '/marca/view?id='.$model->id.'&inv=2';
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' =>'Ver'
                ]);
            },
            'update' => function ($url, $model) {
                $url = '/marca/update?id='.$model->id.'&inv=0&invo=2';
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'Editar'),
                ]);
            },
          ],],
        ],
    ]); ?>



    <?php Pjax::end(); ?>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p><li><label>Material de Aros:</label></li></p>
    <p>
        <?= Html::a(Yii::t('app', 'Registro'), ['materiala/create',  'inv'=>0,'invo'=>2,'op'=> 0, 'ido'=>0], ['class' => 'btn btn-primary']) ?>
     </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        'filterModel' => $searchModel1,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Nombre',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view} {update}',
            'buttons'=>[
             'view' => function ($url, $model) {
                $url = '/materiala/view?id='.$model->id.'&inv=2';
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' =>'Ver'
                ]);
            },
            'update' => function ($url, $model) {
                $url = '/materiala/update?id='.$model->id.'&inv=0&invo=2';
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'Editar'),
                ]);
            },
          ],],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
	<?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p><li><label>Material de Lentes:</label></li></p>
    <p>
        <?= Html::a(Yii::t('app', 'Registro'), ['materiall/create', 'inv'=>0,'invo'=>2,'op'=> 0, 'ido'=>0], ['class' => 'btn btn-primary']) ?>
     </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        'filterModel' => $searchModel2,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Material',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view} {update}',
            'buttons'=>[
             'view' => function ($url, $model) {
                $url = '/materiall/view?id='.$model->id.'&inv=2';
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' =>'Ver'
                ]);
            },
            'update' => function ($url, $model) {
                $url = '/materiall/update?id='.$model->id.'&inv=0&invo=2';
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'Editar'),
                ]);
            },
          ],],
        ],
    ]); ?>

  	<?php Pjax::end(); ?>
  	<?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p><li><label>Tipos de Lentes:</label></li></p>
    <p>
        <?= Html::a(Yii::t('app', 'Registro'), ['Tipo/create', 'inv'=>0,'invo'=>2,'op'=> 0, 'ido'=>0], ['class' => 'btn btn-primary']) ?>
     </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider3,
        'filterModel' => $searchModel3,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Tipo',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view} {update}',
            'buttons'=>[
             'view' => function ($url, $model) {
                $url = '/tipo/view?id='.$model->id.'&inv=2';
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' =>'Ver'
                ]);
            },
            'update' => function ($url, $model) {
                $url = '/tipo/update?id='.$model->id.'&inv=0&invo=2';
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'Editar'),
                ]);
            },
          ],],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p><li><label>Depreciaciones:</label></li></p>
    <p>
        <?= Html::a(Yii::t('app', 'Registro'), ['depreciacion/create', 'inv'=>2], ['class' => 'btn btn-primary']) ?>
     </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider4,
        'filterModel' => $searchModel4,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Nombre',
            'Descripcion:ntext',
            'porcentaje',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view} {update}',
            'buttons'=>[
             'view' => function ($url, $model) {
                $url = '/depreciacion/view?id='.$model->id.'&inv=2';
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' =>'Ver'
                ]);
            },
            'update' => function ($url, $model) {
                $url = '/depreciacion/update?id='.$model->id.'&inv=2';
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'Editar'),
                ]);
            },
          ],],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>