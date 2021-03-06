<?php

namespace app\controllers;

use Yii;
use app\models\Depreciacion;
use app\models\DepreciacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DepreciacionController implements the CRUD actions for Depreciacion model.
 */
class DepreciacionController extends Controller
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
     * Lists all Depreciacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $searchModel = new DepreciacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Depreciacion model.
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
     * Creates a new Depreciacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($inv)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Depreciacion();
        if($inv == 1 )
        {

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['mobyequipo/create', 'inv' => $inv]);
            }   
        }
        if($inv == 2 )
        {

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['inventario/detalles']);
            }   
        }

        return $this->render('create', [
            'model' => $model,
            'inv' => $inv,
        ]);
    }

    /**
     * Updates an existing Depreciacion model.
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
            return $this->redirect(['inventario/detalles']);
        }

        return $this->render('update', [
            'model' => $model,
            'inv' => $inv,
        ]);
    }

    /**
     * Deletes an existing Depreciacion model.
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
     * Finds the Depreciacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Depreciacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Depreciacion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
