<?php

namespace app\controllers;

use Yii;
use app\models\Materiala;
use app\models\MaterialaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaterialaController implements the CRUD actions for Materiala model.
 */
class MaterialaController extends Controller
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
     * Lists all Materiala models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaterialaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Materiala model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $inv)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'inv' => $inv,
        ]);
    }

    /**
     * Creates a new Materiala model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($inv, $invo, $op, $ido)
    {
        $model = new Materiala();
        if($invo == 1)
        {

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['aro/create', 'inv' => $invo]);
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

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['aro/createc','inv' => $invo, 'ido' => $ido,'op' => $op]);
            }   
        }

        return $this->render('create', [
            'model' => $model,
            'invo' => $invo,
            'inv' => $inv,
            'ido' => $ido,
            'op' => $op,
        ]);
    }

    /**
     * Updates an existing Materiala model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $inv, $invo)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['inventario/detalles']);
        }

        return $this->render('update', [
            'model' => $model,
            'inv' => $inv,
            'invo' => $invo,
        ]);
    }

    /**
     * Deletes an existing Materiala model.
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
     * Finds the Materiala model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Materiala the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Materiala::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
