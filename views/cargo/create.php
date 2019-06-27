<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cargo */

$this->title = Yii::t('app', 'Registro Cargo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recursos Humanos'), 'url' => ['rhumanos/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalles'), 'url' => ['rhumanos/detalles']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cargo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'inv' => $inv,
    ]) ?>

</div>
