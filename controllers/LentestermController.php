<?php

namespace app\controllers;

use Yii;
use app\models\Lentesterm;
use app\models\Materiall;
use app\models\Tipo;
use app\models\LentestermSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LentestermController implements the CRUD actions for Lentesterm model.
 */
class LentestermController extends Controller
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
     * Lists all Lentesterm models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $searchModel = new LentestermSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Lentesterm model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $inv)
    {   
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = $this->findModel($id);
        $model1 = Materiall::findOne($model->Material_id);
        $model2 = Tipo::findOne($model->Tipo_id);
        return $this->render('view', [
            'model' => $model,
            'model1' => $model1,
            'model2' => $model2,
            'inv' => $inv,
        ]);
    }

    /**
     * Creates a new Lentesterm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($inv)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Lentesterm();
        $model->Porcentaje_ganancia = 0;
        $model->Precio_compra = 0;
        $model->Precio_venta = 0;
        $model->Existencia = 0;
        $mats = [];
        $tmp = Materiall::find()->all();
        foreach ($tmp as $mat) { 
            $mats[$mat->id]="Material: ".$mat->Material;
        }
        $tips = [];
        $tmp1 = Tipo::find()->all();
        foreach ($tmp1 as $tip) { 
            $tips[$tip->id]="Tipo: ".$tip->Tipo;
        }
        if($inv == 1)
        {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['entrada/createinlst', 'id' => $model->id]);
            }   
        }

        return $this->render('create', [
            'model' => $model,
            'inv' => $inv,
            'mats' => $mats,
            'tips' => $tips,
        ]);
    }
    public function actionCreatec($inv, $ido, $op)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Lentesterm();
        $model->Porcentaje_ganancia = 0;
        $model->Precio_compra = 0;
        $model->Precio_venta = 0;
        $model->Existencia = 0;
        $mats = [];
        $tmp = Materiall::find()->all();
        foreach ($tmp as $mat) { 
            $mats[$mat->id]="Material: ".$mat->Material;
        }
        $tips = [];
        $tmp1 = Tipo::find()->all();
        foreach ($tmp1 as $tip) { 
            $tips[$tip->id]="Tipo: ".$tip->Tipo;
        }
        if($inv == 3)
        {

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['detallecompra/create','id'=> $ido, 'op'=>$op , 'idp' => $model->id]);
            }   
        }

        return $this->render('create', [
            'model' => $model,
            'inv' => $inv,
            'mats' => $mats,
            'tips' => $tips,
            'ido' => $ido,
            'op' => $op,
        ]);
    }

    /**
     * Updates an existing Lentesterm model.
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
         $mats = [];
        $tmp = Materiall::find()->all();
        foreach ($tmp as $mat) { 
            $mats[$mat->id]="Material: ".$mat->Material;
        }
        $tips = [];
        $tmp1 = Tipo::find()->all();
        foreach ($tmp1 as $tip) { 
            $tips[$tip->id]="Tipo: ".$tip->Tipo;
        }
        if($inv == 1)
        {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['entrada/createinlst', 'id' => $model->id]);
            }   
        }

        return $this->render('update', [
            'model' => $model,
            'inv' => $inv,
            'mats' => $mats,
            'tips' => $tips,
        ]);
    }

    /**
     * Deletes an existing Lentesterm model.
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
     * Finds the Lentesterm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Lentesterm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lentesterm::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
