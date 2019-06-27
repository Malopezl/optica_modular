<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = Yii::t('app', 'Financiero');
?>
  <h1 align="left"><?= Html::encode($this->title) ?></h1>
<p>
	 <hr>
    <p>

    	<center>
        <?= Html::a(Yii::t('app', 'Compras'), ['compras/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Proveedores'), ['proveedores/mercaderia'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cuentas'), ['financiero/cuentas'], ['class' => 'btn btn-primary']) ?>
         <?= Html::a(Yii::t('app', 'Nomina'), ['nomina/index'], ['class' => 'btn btn-primary']) ?>


        </center>
    </p>
    <hr>
</p>
<div class="inventario-index">

</div>