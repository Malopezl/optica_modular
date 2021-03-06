<?php

namespace app\controllers;

use Yii;
use app\models\Materiall;
use app\models\MateriallSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MateriallController implements the CRUD actions for Materiall model.
 */
class MateriallController extends Controller
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
     * Lists all Materiall models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $searchModel = new MateriallSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Materiall model.
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
     * Creates a new Materiall model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($inv, $invo, $op, $ido)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Materiall();
        if($invo == 1)
        {
            if($inv == 1)
            {
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['lentesterm/create', 'inv' => $invo]);
                } 
            }
            else if($inv == 2)
            {
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['lenteterm/create', 'inv' => $invo]);
                } 
            } 
            
        }
        else if($invo == 2)
        {

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['inventario/detalles']);
            }   
        }
        else if($invo == 3)
        {
            if($inv == 1)
            {
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['lentesterm/createc','inv' => $invo, 'ido' => $ido,'op' => $op]);
                }  
            }
            else if($inv == 2)
            {
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['lenteterm/createc','inv' => $invo, 'ido' => $ido,'op' => $op]);
                } 
            } 
        }

        return $this->render('create', [
            'model' => $model,
            'invo' => $invo,
            'inv' => $inv,
            'op' => $op,
            'ido' => $ido,
        ]);
    }

    /**
     * Updates an existing Materiall model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $inv, $invo)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['inventario/detalles']);
        }

        return $this->render('update', [
            'model' => $model,
            'inv' =>    $inv,
            'invo' => $invo,
        ]);
    }

    /**
     * Deletes an existing Materiall model.
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
     * Finds the Materiall model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Materiall the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Materiall::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
