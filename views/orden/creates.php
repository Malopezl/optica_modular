<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Orden */

$this->title = Yii::t('app', 'Registrar Orden');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas')];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Venta')];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orden-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_forms', [
        'model' => $model,
        'id' => $id,
            'ido' => $ido,
            'reid' => $reid,
            'liid' => $liid,
            'ldid' => $ldid,
            'arid' => $arid,
            'model1' => $model1,
            'model2' => $model2,
            'model23' => $model23,
            'model31' => $model31,
            'model3' => $model3,
             'model41' => $model41,
            'model4' => $model4,
        ]) ?>

</div>
