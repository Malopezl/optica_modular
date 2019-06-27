<?php
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\grid\GridView;
$this->title = Yii::t('app', 'Cuentas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Financiero'), 'url' => ['financiero/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="financiero-cuentas">
	<h1><?= Html::encode($this->title) ?></h1>
     <hr>
     <p>
    <?php echo Html::a(Yii::t('app', 'Regresar'), ['financiero/index'], ['class' => 'btn btn-danger']); ?>
 	</p>
 	<p>
<h3>Bancos:</h3>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<p><?php echo Html::a(Yii::t('app', 'Registrar nueva cuenta'), ['bancos/create', 'id' => 0], ['class' => 'btn btn-primary']); echo "  ";?>
<?php echo Html::a(Yii::t('app', 'Deposito'), ['deposito/create'], ['class' => 'btn btn-primary']);echo "  "; ?>
<?php echo Html::a(Yii::t('app', 'Retiro'), ['retiro/create'], ['class' => 'btn btn-primary']); ?>
	
</p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'No_cuenta',
            'Total',
            'Nombre_b',
            'Tipo_cuenta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
 	</p>
 	<p>
 <h3>Caja: </h3>
 <p>
 	<?php echo Html::a(Yii::t('app', 'Nueva Caja'), ['caja/create'], ['class' => 'btn btn-primary']);echo "  "; ?>
 	

 </p>
       <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider1,
        'filterModel' => $searchModel1,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'Total',
            'Fecha',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
 	</p>

</div>