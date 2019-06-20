<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lenteterm */

$this->title = Yii::t('app', 'Registrar Aro');
if($inv == 1)
{
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['inventario/index']];
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Mercaderia'), 'url' => ['inventario/mercaderia']];
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ingresos'), 'url' => ['entrada/createinar', 'id' => 0]];
    $this->params['breadcrumbs'][] = $this->title;
}
?>
<div class="lenteterm-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php 
        if($inv = 1)
        {
            $model->Precio_compra=0;
            $model->Existencia=0;
            $model->Precio_venta=0;
            echo $this->render('_formen', [
                'model' => $model,
                'mats'=> $mats,
                'mars' => $mars,
                'inv' => $inv,
            ]);
        }   
    ?>

</div>
