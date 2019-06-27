<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Clientes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas'), 'url' => ['cventas/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Registrar Nuevo Cliente'), ['create', 'inv' => 1 ], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Inicio'), ['cventas/index'], ['class' => 'btn btn-danger']) ?>
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
            'NIT',
            'Direccion',
            'Telefono',
            'Correo_Electronico',
            //'Correo_electronico2',
            //'Telefono2',
            //'Saldo',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view} {update}',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
