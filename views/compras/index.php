<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ComprasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Compras');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Financiero'), 'url' => ['financiero/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compras-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Registrar Nueva Compra'), ['create', 'idp' => 0], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Regresar'), ['financiero/index'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Fecha',
            'Nodocumeto',
            'Total',
            'Contado',
            //'Credito',
            //'Comprascol',
            //'Empleado_id',
            //'Proveedores_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
