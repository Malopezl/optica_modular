<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mobyequipo */

$this->title = Yii::t('app', 'Registrar Mobiliario y Equipo');
if($inv == 1 )
{

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['inventario/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mobiliario y Equipo'), 'url' => ['mobyequipo/index']];
$this->params['breadcrumbs'][] = $this->title;

}
?>
<div class="mobyequipo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    if($inv == 1)
    {   
        
    	 echo $this->render('_form', [
       		'model' => $model,
        	'inv' => $inv,
        	'deps' => $deps,
    	]);	
    }  
    ?>

</div>
