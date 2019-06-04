<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materiala */

$this->title = Yii::t('app', 'Create Materiala');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Materialas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materiala-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'invo' => $invo,
        'inv' => $inv,
    ]) ?>

</div>
