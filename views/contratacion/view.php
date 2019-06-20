<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url; 

/* @var $this yii\web\View */
/* @var $model app\models\Contratacion */

$this->title = Yii::t('app', 'Detalle Contrato '.$model->id);

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recursos Humanos'), 'url' => ['rhumanos/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contrataciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="contratacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

<!--
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
-->
    <p>
        <?= Html::a(Yii::t('app', 'Inicio'), ['contratacion/index'], ['class' => 'btn btn-danger']) ?>    
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'Encargado_id',
            'Fechai',
            'Fechaf',
            'Contrato',
        ],
    ]) ?>
<?php if (Yii::$app->session->hasFlash('errordownload')): ?>
<strong class="label label-danger">¡Ha ocurrido un error al descargar el archivo!</strong>

<?php else: ?>
<a href="<?= Url::toRoute(["contratacion/download", "file" => $model->Contrato]) ?>">Descargar contrato</a>

<?php endif; ?>


</div>
