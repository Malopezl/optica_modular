<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Accesorios */

$this->title = Yii::t('app', 'Registrar Accesorio');
if($inv == 1)
{
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['inventario/index']];
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mercaderia'), 'url' => ['inventario/mercaderia']];
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ingresos'), 'url' => ['entrada/createinacc', 'id' => 0]];
    $this->params['breadcrumbs'][] = $this->title;
}
?>
<div class="accesorios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php 
    	if($inv == 1 )
    	{
            
    		echo $this->render('_formen', [
			        'model' => $model,
			        'inv' => $inv,
			    ]);
    	}
    ?>

</div>
