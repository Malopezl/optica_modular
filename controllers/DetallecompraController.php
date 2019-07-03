<?php

namespace app\controllers;

use Yii;
use app\models\Detallecompra;
use app\models\DetallecompraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Aro;
use app\models\Accesorios;
use app\models\Materiall;
use app\models\Materiala;
use app\models\Marca;
use app\models\Tipo;
use app\models\Lentesterm;
use app\models\Lenteterm;

/**
 * DetallecompraController implements the CRUD actions for Detallecompra model.
 */
class DetallecompraController extends Controller
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
     * Lists all Detallecompra models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $searchModel = new DetallecompraSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Detallecompra model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Detallecompra model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id, $op, $idp)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Detallecompra();
        $model->Total = 0;
        $model->Compras_id = $id;
        $aros = [];
        $tmp = Aro::find()->all();
        foreach ($tmp as $aro) {
            $material = Materiala::findOne($aro->Material_id);
            $marca = Marca::findOne($aro->Marca_id);
            $aros[$aro->id]="Marca: ".$marca->Nombre."; Codigo: ".$aro->Codigo."; Material: ".$material->Nombre."; Existencia: ".$aro->Existencia;
        }
        $acces = [];
        $tmp1 = Accesorios::find()->all();
        foreach ($tmp1 as $acce) {
            $acces[$acce->id]="Nombre: ".$acce->Nombre."; Descripcion: ".$acce->Descripcion."; Existencia: ".$acce->Existencia;
        }
        $lentes = [];
        $tmp2 = Lentesterm::find()->all();
        foreach ($tmp2 as $lente) {
            $material = Materiall::findOne($lente->Material_id); 
            $lentes[$lente->id]="Graduacion base: ".$lente->Graduacion_base."Material: ".$material->Material;
        }
        $lentes1 = [];
        $tmp3 = Lenteterm::find()->all();
        foreach ($tmp3 as $lente1) {
            $material1 = Materiall::findOne($lente->Material_id);
            $tipo1 = Tipo::findOne($lente->Tipo_id);
            $lentes1[$lente1->id]="Graduacion base: ".$lente1->Graduacion_base."; Graduacion excedente: ".$lente1->Graduacion_excedente."; Material: ".$material1->Material."; Tipo:".$tipo1->Tipo;
        }
        if($op == 1 && $idp != 0 )
        {
            $model->Lenteterm_id = $idp;
        }
        else if($op == 2 && $idp != 0 )
        {
            $model->Lentesterm_id = $idp;
        }
        else if($op == 3 && $idp != 0 )
        {
            $model->Aro_id = $idp;
        }
        else if($op == 4 && $idp != 0 )
        {
            $model->Accesorios_id = $idp;
        }
        else if($op == 5 && $idp != 0 )
        {
            $model->Mobyequipo =$idp;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['compras/creates', 'id' => $id]);
        }
        return $this->render('create', [
            'model' => $model,
            'id' => $id,
            'op' => $op,
            'aros' => $aros,
            'acces' => $acces,
            'lentes' => $lentes,
            'lentes1' => $lentes1,
        ]);
    }

    /**
     * Updates an existing Detallecompra model.
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
     * Deletes an existing Detallecompra model.
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
     * Finds the Detallecompra model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Detallecompra the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Detallecompra::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
