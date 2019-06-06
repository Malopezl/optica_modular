<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = Yii::t('app', 'Inventario');
?>

  <h1 align="left"><?= Html::encode($this->title) ?></h1>
<p>
	 <hr>
    <p>

    	<center>
        <?= Html::a(Yii::t('app', 'Mobiliario y Equipo'), ['mobyequipo/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Mercaderia'), ['inventario/mercaderia'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Detalles'), ['inventario/detalles'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Ingresos/Salidas'), ['inventario/ingeg'], ['class' => 'btn btn-primary']) ?>
        </center>
    </p>
    <hr>

    <p>

         <?= Html::img('@web/img/infoi1.jpg', ['alt'=>'some', 'class'=>'thing']);?>
    </p>
</p>
<div class="inventario-index">

</div>