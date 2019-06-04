<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Aro */

$this->title = Yii::t('app', 'Create Aro');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Aros'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php 
        if($inv == 1 )
        {
            echo $this->render('_formen', [
                    'model' => $model,
                    'mats'=> $mats,
                     'mars' => $mars,
                    'inv' => $inv,
                ]);
        }
    ?>

</div>
