<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url; 

/* @var $this yii\web\View */
/* @var $model app\models\Empleado */

$this->title = 'Detalles de empleado';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recursos Humanos'), 'url' => ['rhumanos/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Empleados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="empleado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Regresar'), ['index'], ['class' => 'btn btn-primary']) ?>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'Nombre',
            'Nit',
            'Telefono',
            'Telefono2',
            'Correo_Electronico',
            'Correo_electronico2',
            'Direccion',
            'Fecha_Nacimiento',
            'Edad',
            'Estado_civil',
            'Sexo',
            'No_licencia',
            'Cv',
            'Profesion_id',
            'Cargo_id',
            'Contratacion_id',
        ],
    ]) ?>
<?php if (Yii::$app->session->hasFlash('errordownload')): ?>
<strong class="label label-danger">¡Ha ocurrido un error al descargar el archivo!</strong>

<?php else: ?>
<a href="<?= Url::toRoute(["empleado/download", "file" => $model->Cv]) ?>">Descargar curriculum</a>

<?php endif; ?>

</div>
