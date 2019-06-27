<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nomina */

$this->title = Yii::t('app', 'Ingreso Nomina');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nominas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nomina-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
