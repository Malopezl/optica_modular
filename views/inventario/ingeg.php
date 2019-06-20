<?php 
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = Yii::t('app', 'Ingresos/Salidas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['inventario/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventario-ingeg">
     <h1><?= Html::encode($this->title) ?></h1>
     <hr>
     <p>
    <?php echo Html::a(Yii::t('app', 'Regresar'), ['inventario/index'], ['class' => 'btn btn-primary']); ?>
 </p>
     <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p><li><label>Ingreso:</label></li></p>
  	<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Fecha',
            'Nodocumento',
            'Encargado',
            //'Aro_id',
            //'Accesorios_id',
            //'Lentesterm_id',
            //'Lenteterm_id',
            //'Mobyequipo_id',
            'Cantidad',
            //'Precio',
  
            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view}',
            'buttons'=>[
             'view' => function ($url, $model) {
                $url = '/entrada/view?id='.$model->id.'&inv=1';
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' =>'Ver'
                ]);
            },
            'update' => function ($url, $model) {
                $url = '/entrada/update?id='.$model->id.'&inv=1';
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'Editar'),
                ]);
            },
          ],],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
     <hr>
     <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p><li><label>Salida:</label></li></p>
  
  	<?= GridView::widget([
        'dataProvider' => $dataProvider1,
        'filterModel' => $searchModel1,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Fecha',
            'Nodocumento',
            'Encargado',
            'Cantidad',
            //'Mobyequipo_id',
            //'Lenteterm_id',
            //'Lentesterm_id',
            //'Accesorios_id',
            //'Aro_id',
            

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view}',
            'buttons'=>[
             'view' => function ($url, $model) {
                $url = '/salida/view?id='.$model->id.'&inv=1';
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' =>'Ver'
                ]);
            },
            'update' => function ($url, $model) {
                $url = '/salida/update?id='.$model->id.'&inv=1';
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'Editar'),
                ]);
            },
          ],],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
    <hr>
</div>