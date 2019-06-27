<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Detallenomina */

$this->title = Yii::t('app', 'Ingreso Detalle de nomina');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detallenominas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detallenomina-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
