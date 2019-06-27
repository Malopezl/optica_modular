<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Profesion */

$this->title = $model->Nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recursos Humanos'), 'url' => ['rhumanos/index']];

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalles'), 'url' => ['rhumanos/detalles']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profesiones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="profesion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        
         <?= Html::a(Yii::t('app', 'Regresar'), ['rhumanos/detalles'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'Nombre',
        ],
    ]) ?>

</div>
