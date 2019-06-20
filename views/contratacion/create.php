<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contratacion */

$this->title = Yii::t('app', 'Nueva Contratación');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recursos Humanos'), 'url' => ['rhumanos/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contrataciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contratacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'inv' => $inv,
    ]) ?>
</div>
