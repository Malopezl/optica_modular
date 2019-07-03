<?php

namespace app\controllers;

use Yii;
use app\models\Aro;
use app\models\AroSearch;
use app\models\Marca;
use app\models\Materiala;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AroController implements the CRUD actions for Aro model.
 */
class AroController extends Controller
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
     * Lists all Aro models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $searchModel = new AroSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Aro model.
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
        $model1 = Materiala::findOne($model->Material_id);
        $model2 = Marca::findOne($model->Marca_id);
        return $this->render('view', [
            'model' => $model,
            'model1' => $model1,
            'model2' => $model2,
            'inv' => $inv,
        ]);
    }

    /**
     * Creates a new Aro model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($inv)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Aro();
        $model->Precio_compra = 0 ;
        $model->Existencia = 0 ;
        $model->Precio_venta = 0 ;
        $mats = [];
        $tmp = Materiala::find()->all();
        foreach ($tmp as $mat) { 
            $mats[$mat->id]="Material: ".$mat->Nombre;
        }
        $mars = [];
        $tmp1 = Marca::find()->all();
        foreach ($tmp1 as $mar) { 
            $mars[$mar->id]="Marca: ".$mar->Nombre;
        }
        if($inv == 1)
        {

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['entrada/createinar', 'id' => $model->id]);
            }   
        }

        return $this->render('create', [
            'model' => $model,
            'mats'=> $mats,
            'mars' => $mars,
            'inv' => $inv,
        ]);
    }
    public function actionCreatec($inv, $ido, $op)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Aro();
        $model->Precio_compra = 0 ;
        $model->Existencia = 0 ;
        $model->Precio_venta = 0 ;
        $mats = [];
        $tmp = Materiala::find()->all();
        foreach ($tmp as $mat) { 
            $mats[$mat->id]="Material: ".$mat->Nombre;
        }
        $mars = [];
        $tmp1 = Marca::find()->all();
        foreach ($tmp1 as $mar) { 
            $mars[$mar->id]="Marca: ".$mar->Nombre;
        }
        if($inv == 3)
        {

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['detallecompra/create','id'=> $ido, 'op'=>$op , 'idp' => $model->id]);
            }   
        }

        return $this->render('create', [
            'model' => $model,
            'mats'=> $mats,
            'mars' => $mars,
            'inv' => $inv,
            'ido' => $ido,
            'op' => $op,
        ]);
    }

    /**
     * Updates an existing Aro model.
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
        $tmp = Materiala::find()->all();
        foreach ($tmp as $mat) { 
            $mats[$mat->id]="Material: ".$mat->Nombre;
        }
        $mars = [];
        $tmp1 = Marca::find()->all();
        foreach ($tmp1 as $mar) { 
            $mars[$mar->id]="Marca: ".$mar->Nombre;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['inventario/mercaderia']);
        }

        return $this->render('update', [
            'model' => $model,
            'mats'=> $mats,
            'mars' => $mars,
            'inv' => $inv,
        ]);
    }

    /**
     * Deletes an existing Aro model.
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
     * Finds the Aro model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Aro the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Aro::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
