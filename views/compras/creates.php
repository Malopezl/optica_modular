<?php

use yii\helpers\Html;

use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model app\models\Compras */

$this->title = Yii::t('app', 'Detalles de Compra');

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Financiero')];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Compras')];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="compras-creates">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    if($model->Total != 0)
    {
    	echo Html::a(Yii::t('app', 'Finalizar'), ['compras/createf', 'id' =>$id], ['class' => 'btn btn-success']);
    } 

     ?>
     <?= Html::a(Yii::t('app', 'Cancelar'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <p>
    	<?php //echo $this->render('_search', ['model' => $searchModel]); 
        	echo Html::tag('h3', Html::encode('Total: '.$model->Total), ['class' => 'et1']);
        ?>
        </p>
        <?php Pjax::begin(); ?>
    <p>
    <?php //echo $this->render('_search', ['model' => $searchModel]); 
    	echo Html::tag('h3', Html::encode('Detalle Compra'), ['class' => 'et1']);
    	echo "   ";
        echo Html::a(Yii::t('app', 'Agregar Lente Terminado'), ['detallecompra/create', 'id' => $id, 'op' => 1, 'idp' => 0], ['class' => 'btn btn-primary']);
        echo "   ";
        echo Html::a(Yii::t('app', 'Agregar Lente Semiterminado'), ['detallecompra/create', 'id' => $id, 'op' => 2, 'idp' => 0], ['class' => 'btn btn-primary']);
        echo "   ";
        echo Html::a(Yii::t('app', 'Agregar Aros'), ['detallecompra/create', 'id' => $id, 'op' =>  3, 'idp' => 0], ['class' => 'btn btn-primary']);
        echo "   ";
        echo Html::a(Yii::t('app', 'Agregar Accesorios'), ['detallecompra/create', 'id' => $id, 'op' => 4, 'idp' => 0], ['class' => 'btn btn-primary']);
        echo "   ";
        echo Html::a(Yii::t('app', 'Agregar Mobiliario y Equipo '), ['detallecompra/create', 'id' => $id, 'op' => 5, 'idp' => 0], ['class' => 'btn btn-primary']);
        ?>
        </p>
    <?php
    	
    	echo  GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [ 
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'Cantidad',
            'Precio_compra',
            'Total',
            'Lenteterm_id',
            //'Lentesterm_id',
            //'Accesorios_id',
            //'Aro_id',
            //'Compras_id',
            //'Mobyequipo_id',

            ['class' => 'yii\grid\ActionColumn',
            'template'=>'{view}',
            'buttons'=>[
             'view' => function ($url, $model) {
                $url = '/orden/view?id='.$model->id.'&inv=2&idi='.$model->Compras_id;
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
     <br>
</div>
