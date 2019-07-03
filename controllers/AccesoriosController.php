<?php

namespace app\controllers;

use Yii;
use app\models\Accesorios;
use app\models\AccesoriosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AccesoriosController implements the CRUD actions for Accesorios model.
 */
class AccesoriosController extends Controller
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
     * Lists all Accesorios models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $searchModel = new AccesoriosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Accesorios model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $inv)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'inv' => $inv,
        ]);
    }

    /**
     * Creates a new Accesorios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($inv)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Accesorios();
        $model->Precio_compra = 0 ;
            $model->Existencia = 0 ;
            $model->Precio_venta = 0 ;
        if($inv == 1)
        {

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['entrada/createinacc', 'id' => $model->id]);
            }   
        }

        return $this->render('create', [
            'model' => $model,
            'inv' => $inv,
        ]);
    }
    public function actionCreatec($inv, $ido, $op)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Accesorios();
        $model->Precio_compra = 0 ;
            $model->Existencia = 0 ;
            $model->Precio_venta = 0 ;
        if($inv == 3)
        {

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['detallecompra/create','id'=> $ido, 'op'=>$op , 'idp' => $model->id]);
            }   
        }

        return $this->render('create', [
            'model' => $model,
            'inv' => $inv,
            'ido' => $ido,
            'op' => $op,
        ]);
    }

    /**
     * Updates an existing Accesorios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $inv)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['inventario/mercaderia']);
        }

        return $this->render('update', [
            'model' => $model,
            'inv' => $inv,
        ]);
    }

    /**
     * Deletes an existing Accesorios model.
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
     * Finds the Accesorios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Accesorios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Accesorios::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
