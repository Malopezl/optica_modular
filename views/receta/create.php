<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Receta */

$this->title = Yii::t('app', 'Create Receta');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recetas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="receta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
