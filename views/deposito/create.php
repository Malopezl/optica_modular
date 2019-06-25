<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Deposito */

$this->title = Yii::t('app', 'Create Deposito');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Depositos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deposito-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
