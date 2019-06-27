<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DetallenominaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Detalle de nomina');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallenomina-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Ingresar nuevo  Detalle de nomina'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'Horas_extra',
            'bonos_extra',
            'B_incentivo',
            'Sub-total',
            //'T_devengado',
            //'Igss_total',
            //'Isr_total',
            //'D_extra',
            //'T_descuentos',
            //'T_percibido',
            //'Nomina_id',
            //'Empleado_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
