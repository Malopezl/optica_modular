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
        <?= Html::a(Yii::t('app', 'Cotizacion'), ['cotizacion/index'], ['class' => 'btn btn-primary']) ?>
        </center>
    </p>
    <hr>
</p>
<div class="inventario-index">

</div>