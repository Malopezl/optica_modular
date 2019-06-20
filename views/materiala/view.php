<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Materiala */

$this->title = $model->Nombre;
if($inv == 2 ){


$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventario'), 'url' => ['inventario/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalles'), 'url' => ['inventario/detalles']];
$this->params['breadcrumbs'][] = $this->title;
}
\yii\web\YiiAsset::register($this);
?>
<div class="materiala-view">

    <h1><?= Html::encode($this->title) ?></h1>
<!--
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
-->
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
         //   'id',
            'Nombre',
        ],
    ]) ?>
<?php
    if($inv == 2)
    {    
    echo Html::a(Yii::t('app', 'Regresar'), ['inventario/detalles'], ['class' => 'btn btn-primary']);
    }
?>
</div>
