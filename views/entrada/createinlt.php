<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Entrada */

$this->title = Yii::t('app', 'Registro de Ingreso');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Entradas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entrada-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_forminlt', [
        'model' => $model,
        'lentes'=> $lentes,
    ]) ?>

</div>
