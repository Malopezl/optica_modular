<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lentesterm */

$this->title = Yii::t('app', 'Registrar Lente-Semiterminado');
if($inv == 1)
{
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['inventario/index']];
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mercaderia'), 'url' => ['inventario/mercaderia']];
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ingresos'), 'url' => ['entrada/createinlst', 'id' => 0]];
    $this->params['breadcrumbs'][] = $this->title;
}
?>
<div class="lentesterm-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    if($inv == 1)
    {
    	
	    echo  $this->render('_formen', [
	        'model' => $model,
	        'mats' => $mats,
            'tips' => $tips,
            'inv' => $inv,
            'ido' => 0,
            'op' => 0,
	    	])	;
	    }
    else if($inv == 3)
    {
        
        echo  $this->render('_formen', [
            'model' => $model,
            'mats' => $mats,
            'tips' => $tips,
            'inv' => $inv,
            'ido' => $ido,
            'op' => $op,
            ])  ;
        }  
    ?>

</div>
