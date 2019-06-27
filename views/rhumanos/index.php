<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = Yii::t('app', 'Recursos Humanos');
?>

  <h1 align="left"><?= Html::encode($this->title) ?></h1>
<p>
	 <hr>
    <p>

    	<center>
        <?= Html::a(Yii::t('app', 'Empleados'), ['empleado/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Contratos'), ['contratacion/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Detalles'), ['rhumanos/detalles'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Asistencia'), ['entradasalida/index'], ['class' => 'btn btn-primary']) ?>
        </center>
    </p>
    <hr>
</p>
<div class="inventario-index">

</div>