<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Detalleorden */

$this->title = Yii::t('app', 'Agregar Articulo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalleordens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalleorden-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'id' => $id,
            'ido' => $ido,
            'reid' => $reid,
            'liid' => $liid,
            'ldid' => $ldid,
            'arid' => $arid,
            'op' => $op,
            'lentes'=> $lentes,
            'lentes1'=> $lentes1,
            'aros'=> $aros,
    ]) ?>

</div>
