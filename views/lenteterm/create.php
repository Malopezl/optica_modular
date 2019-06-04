<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lenteterm */

$this->title = Yii::t('app', 'Create Lenteterm');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lenteterms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lenteterm-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php 
    	if($inv = 1)
    	{
    		echo $this->render('_formen', [
		        'model' => $model,
		        'inv' => $inv,
		        'mats' => $mats,
		        'tips' => $tips,
		    ]);
    	}	
    ?>

</div>
