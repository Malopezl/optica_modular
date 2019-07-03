<?php

namespace app\controllers;

use Yii;
use app\models\Compras;
use app\models\ComprasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Empleado;
use app\models\Proveedores;
use app\models\Detallecompra;
use app\models\DetallecompraSearch;
/**
 * ComprasController implements the CRUD actions for Compras model.
 */
class ComprasController extends Controller
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
     * Lists all Compras models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        } 
        $searchModel = new ComprasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Compras model.
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
     * Creates a new Compras model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idp)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Compras();
        $model->Total = 0 ;
        $model->Contado = 0 ;
        $model->Credito = 0;

        if($idp != 0)
        {
            $model->Proveedores_id = $idp;
        }
        $provs = [];
        $tmp = Proveedores::find()->all();
        foreach ($tmp as $prov) {
            $provs[$prov->id]="Nombre: ".$prov->Nombre."; NIT: ".$prov->NIT;
        }
        $emps = [];
        $tmp1 = Empleado::find()->all();
        foreach ($tmp1 as $emp) {
            $emps[$emp->id]="Nombre: ".$emp->Nombre;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['creates', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'provs' => $provs,
            'emps' => $emps,
        ]);
    }
    public function actionCreates($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = $this->findModel($id);
        $model->Total =1;
        $searchModel = new DetallecompraSearch();
        $searchModel->Compras_id=$id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams); 

        return $this->render('creates', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
        ]);
    }
    public function actionCreatef($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = $this->findModel($id);
         $provs = [];
        $tmp = Proveedores::find()->all();
        foreach ($tmp as $prov) {
            $provs[$prov->id]="Nombre: ".$prov->Nombre."; NIT: ".$prov->NIT;
        }
        $emps = [];
        $tmp1 = Empleado::find()->all();
        foreach ($tmp1 as $emp) {
            $emps[$emp->id]="Nombre: ".$emp->Nombre;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        }

        return $this->render('createf', [
            'model' => $model,
            'provs' => $provs,
            'emps' => $emps,
        ]);
    }
    /**
     * Updates an existing Compras model.
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
     * Deletes an existing Compras model.
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
     * Finds the Compras model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Compras the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Compras::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
