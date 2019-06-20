<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DepreciacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Detalles');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recursos Humanos'), 'url' => ['rhumanos/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rhumanos-detalles">

    <h1><?= Html::encode($this->title) ?></h1>
<p>
        <?= Html::a(Yii::t('app', 'Inicio'), ['rhumanos/index'], ['class' => 'btn btn-danger']) ?>
    </p>

 	<?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p><li><label>Cargos:</label></li></p>
    <p>
        <?= Html::a(Yii::t('app', 'Registro'), ['cargo/create', 'inv'=>0,], ['class' => 'btn btn-primary']) ?>
     </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Nombre',
            //Sueldo_Base,
            //Nivel_Acceso,

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view} {update}',
            'buttons'=>[
             'view' => function ($url, $model) {
                $url = '/cargo/view?id='.$model->id.'&inv=2';
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' =>'Ver'
                ]);
            },
            'update' => function ($url, $model) {
                $url = '/cargo/update?id='.$model->id.'&inv=0&invo=2';
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
    <p><li><label>Profesiones:</label></li></p>
    <p>
        <?= Html::a(Yii::t('app', 'Registro'), ['profesion/create',  'inv'=>0], ['class' => 'btn btn-primary']) ?>
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
                $url = '/profesion/view?id='.$model->id.'&inv=2';
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' =>'Ver'
                ]);
            },
            'update' => function ($url, $model) {
                $url = '/profesion/update?id='.$model->id.'&inv=0&invo=2';
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'Editar'),
                ]);
            },
          ],],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>