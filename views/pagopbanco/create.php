<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pagopbanco */

$this->title = Yii::t('app', 'Create Pagopbanco');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pagopbancos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pagopbanco-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
