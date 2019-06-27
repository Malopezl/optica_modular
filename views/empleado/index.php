<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\EmpleadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Empleados');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recursos Humanos'), 'url' => ['rhumanos/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleado-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Nuevo Empleado'), ['create', 'id'=>0], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Inicio'), ['rhumanos/index'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Nombre',
            'Nit',
            'Telefono',
            //'Telefono2',
            'Correo_Electronico',
            //'Correo_electronico2',
            //'Direccion',
            //'Fecha_Nacimiento',
            //'Edad',
            //'Estado_civil',
            //'Sexo',
            //'No_licencia',
            //'Cv',
            //'Profesion_id',
            //'Cargo_id',
            //'Contratacion_id',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view} {update}',
            'buttons'=>[
             'view' => function ($url, $model) {
                $url = '/empleado/view?id='.$model->id;
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' =>'Ver'
                ]);
            },
            'update' => function ($url, $model) {
                $url = '/empleado/update?id='.$model->id;
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'Editar'),
                ]);
            },
          ],],
          ],

    ]); ?>

    <?php Pjax::end(); ?>

  

</div>