<?php

namespace app\controllers;

use Yii;
use app\models\Venta;
use app\models\VentaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Cliente;
use app\models\Orden;
use app\models\OrdenSearch;
use app\models\Detalleventa;
use app\models\DetalleventaSearch;
/**
 * VentaController implements the CRUD actions for Venta model.
 */
class VentaController extends Controller
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
     * Lists all Venta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VentaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Venta model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model =$this->findModel($id);
        $searchModel = new OrdenSearch();
        $searchModel->Venta_id=$id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModel1 = new DetalleventaSearch();
        $searchModel1->Venta_id=$id;
        $dataProvider1 = $searchModel1->search(Yii::$app->request->queryParams);
        return $this->render('view', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModel1' => $searchModel1,
            'dataProvider1' => $dataProvider1,
            'id'=> $id,

        ]);
    }

    /**
     * Creates a new Venta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Venta();
        $model->Finalizada = 0;
        //$entregada-> = 0;
        if($id != 0)
        {
            $model->Cliente_id = $id;
        }
        $clts = [];
        $tmp = Cliente::find()->all();
        foreach ($tmp as $clt) {
            $clts[$clt->id]="Nombre: ".$clt->Nombre."; NIT: ".$clt->NIT."; Saldo: ".$clt->Saldo;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['creates', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'clts' => $clts,
        ]);
    }
    public function actionCreates($id)
    {
        $model = $this->findModel($id);
        if($id != 0)
        {
            $model->Cliente_id = $id;
        }
        $searchModel = new OrdenSearch();
        $searchModel->Venta_id=$id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModel1 = new DetalleventaSearch();
        $searchModel1->Venta_id=$id;
        $dataProvider1 = $searchModel1->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['creates', 'id' => $model->id]);
        }

        return $this->render('creates', [
            'model' => $model,
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModel1' => $searchModel1,
            'dataProvider1' => $dataProvider1,
        ]);
    }
    public function actionCreatef($id)
    {   
        $model = $this->findModel($id);
        if($id != 0)
        {
            $model->Cliente_id = $id;
        }
        $clts = [];
        $tmp = Cliente::find()->all();
        foreach ($tmp as $clt) {
            $clts[$clt->id]="Nombre: ".$clt->Nombre."; NIT: ".$clt->NIT."; Saldo: ".$clt->Saldo;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('createf', [
            'model' => $model,
            'clts' => $clts,
        ]);
    }
    /**
     * Updates an existing Venta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Venta model.
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
     * Finds the Venta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Venta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Venta::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
