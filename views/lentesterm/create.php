<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lentesterm */

$this->title = Yii::t('app', 'Create Lentesterm');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lentesterms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lentesterm-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    if($inv = 1)
    {
    	$model->Porcentaje_ganancia = 0;
    	$model->Precio_venta = 0;
    	$model->Existencia = 0;
	    echo  $this->render('_formen', [
	        'model' => $model,
	        'mats' => $mats,
            'tips' => $tips,
            'inv' => $inv,
	    	])	;
	    } 
    ?>

</div>
