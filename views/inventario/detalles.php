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
        <?= Html::a(Yii::t('app', 'Registro'), ['entrada/createinlst', 'id'=>0], ['class' => 'btn btn-primary']) ?>
     </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>



    <?php Pjax::end(); ?>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p><li><label>Material de Aros:</label></li></p>
    <p>
        <?= Html::a(Yii::t('app', 'Registro'), ['entrada/createinlst', 'id'=>0], ['class' => 'btn btn-primary']) ?>
     </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        'filterModel' => $searchModel1,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
	<?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p><li><label>Material de Lentes:</label></li></p>
    <p>
        <?= Html::a(Yii::t('app', 'Registro'), ['entrada/createinlst', 'id'=>0], ['class' => 'btn btn-primary']) ?>
     </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        'filterModel' => $searchModel2,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Material',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

  	<?php Pjax::end(); ?>
  	<?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p><li><label>Tipos de Lentes:</label></li></p>
    <p>
        <?= Html::a(Yii::t('app', 'Registro'), ['entrada/createinlst', 'id'=>0], ['class' => 'btn btn-primary']) ?>
     </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider3,
        'filterModel' => $searchModel3,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Tipo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p><li><label>Depreciaciones:</label></li></p>
    <p>
        <?= Html::a(Yii::t('app', 'Registro'), ['entrada/createinlst', 'id'=>0], ['class' => 'btn btn-primary']) ?>
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>