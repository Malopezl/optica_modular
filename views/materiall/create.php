<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materiall */

$this->title = Yii::t('app', 'Create Materiall');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Materialls'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materiall-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'invo' => $invo,
        'inv' => $inv,
    ]) ?>

</div>
