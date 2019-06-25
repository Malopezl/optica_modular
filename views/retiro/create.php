<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Retiro */

$this->title = Yii::t('app', 'Create Retiro');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Retiros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="retiro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
