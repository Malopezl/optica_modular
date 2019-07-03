<?php

namespace app\controllers;

use Yii;
use app\models\Detallecotizacion;
use app\models\DetallecotizacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Lentesterm;
use app\models\Lenteterm;
use app\models\Aro;
use app\models\Accesorios;
use app\models\Materiall;
use app\models\Materiala;
use app\models\Marca;
use app\models\Tipo;
/**
 * DetallecotizacionController implements the CRUD actions for Detallecotizacion model.
 */
class DetallecotizacionController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Detallecotizacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $searchModel = new DetallecotizacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Detallecotizacion model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $inv, $idi)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'id' => $id,
            'inv' => $inv,
            'idi' => $idi,
        ]);
    }

    /**
     * Creates a new Detallecotizacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id, $op)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Detallecotizacion();
        $model->Cotizacion_id = $id;
        $model->Total = 0;
        $model->Descuento = 0;
        $lentes = [];
        $tmp = Lentesterm::find()->all();
        foreach ($tmp as $lente) {
            $material = Materiall::findOne($lente->Material_id); 
            $lentes[$lente->id]="Graduacion base: ".$lente->Graduacion_base."Material: ".$material->Material;
        }
        $lentes1 = [];
        $tmp1 = Lenteterm::find()->all();
        foreach ($tmp1 as $lente1) {
            $material1 = Materiall::findOne($lente->Material_id);
            $tipo1 = Tipo::findOne($lente->Tipo_id);
            $lentes1[$lente1->id]="Graduacion base: ".$lente1->Graduacion_base."; Graduacion excedente: ".$lente1->Graduacion_excedente."; Material: ".$material1->Material."; Tipo:".$tipo1->Tipo;
        }
        $aros = [];
        $tmp2 = Aro::find()->all();
        foreach ($tmp2 as $aro) {
            $material = Materiala::findOne($aro->Material_id);
            $marca = Marca::findOne($aro->Marca_id);
            $aros[$aro->id]="Marca: ".$marca->Nombre."; Codigo: ".$aro->Codigo."; Material: ".$material->Nombre;
        }
        $acces = [];
        $tmp3 = Accesorios::find()->all();
        foreach ($tmp3 as $acce) {
            $acces[$acce->id]="Nombre: ".$acce->Nombre."; Descripcion: ".$acce->Descripcion;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['cotizacion/creates', 'id' => $id]);
        }

        return $this->render('create', [
            'model' => $model,
            'id' => $id,
            'op' => $op,
            'lentes'=> $lentes,
            'lentes1'=> $lentes1,
            'aros'=> $aros,
            'acces'=> $acces,
        ]);
    }

    /**
     * Updates an existing Detallecotizacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Detallecotizacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Detallecotizacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Detallecotizacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Detallecotizacion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
