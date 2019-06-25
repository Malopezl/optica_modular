<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pagopefectivo */

$this->title = Yii::t('app', 'Create Pagopefectivo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pagopefectivos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pagopefectivo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
