<?php

namespace app\controllers;

use Yii;
use app\models\Lenteterm;
use app\models\LentetermSearch;
use app\models\Materiall;
use app\models\Tipo;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LentetermController implements the CRUD actions for Lenteterm model.
 */
class LentetermController extends Controller
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
     * Lists all Lenteterm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LentetermSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Lenteterm model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $inv)
    {
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
     * Creates a new Lenteterm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($inv)
    {

        $model = new Lenteterm();
        $model->Precio_compra = 0;
        $model->Existencia = 0;
        $model->Precio_venta = 0;
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
                return $this->redirect(['entrada/createinlt', 'id' => $model->id]);
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

        $model = new Lenteterm();
        $model->Precio_compra = 0;
        $model->Existencia = 0;
        $model->Precio_venta = 0;
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
     * Updates an existing Lenteterm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
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
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['inventario/mercaderia']);
        }

        return $this->render('update', [
            'model' => $model,
            'inv' => $inv,
            'mats' => $mats,
            'tips' => $tips,
        ]);
    }

    /**
     * Deletes an existing Lenteterm model.
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
     * Finds the Lenteterm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Lenteterm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lenteterm::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
