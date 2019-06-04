<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Depreciacion */

$this->title = Yii::t('app', 'Create Depreciacion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Depreciacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="depreciacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'inv' => $inv,
    ]) ?>

</div>
