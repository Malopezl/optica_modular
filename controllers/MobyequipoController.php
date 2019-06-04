<?php

namespace app\controllers;

use Yii;
use app\models\Mobyequipo;
use app\models\Depreciacion;
use app\models\MobyequipoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * MobyequipoController implements the CRUD actions for Mobyequipo model.
 */
class MobyequipoController extends Controller
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
     * Lists all Mobyequipo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MobyequipoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mobyequipo model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Mobyequipo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($inv)
    {
        $model = new Mobyequipo();
        $deps = [];
        $tmp = Depreciacion::find()->all();
        foreach ($tmp as $dep) {
            $deps[$dep->id]="Tipo de Articulo: ".$dep->Nombre." Depreciacion: ".$dep->porcentaje."%";
        }
        if($inv == 1)
        {

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['entrada/create', 'id' => $model->id,'inv'=>$inv]);
            }   
        }

        return $this->render('create', [
            'model' => $model,
            'inv' => $inv,
            'deps'=> $deps,
        ]);
    }

    /**
     * Updates an existing Mobyequipo model.
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
     * Deletes an existing Mobyequipo model.
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
     * Finds the Mobyequipo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mobyequipo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mobyequipo::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
