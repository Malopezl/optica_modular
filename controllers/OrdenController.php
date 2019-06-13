<?php

namespace app\controllers;

use Yii;
use app\models\Orden;
use app\models\OrdenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Receta;
use app\models\Detalleorden;
use app\models\Aro;
use app\models\Lentesterm;
use app\models\Lenteterm;
/**
 * OrdenController implements the CRUD actions for Orden model.
 */
class OrdenController extends Controller
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
     * Lists all Orden models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrdenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Orden model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $inv, $idi)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'inv' => $inv,
            'idi' => $idi,
        ]);
    }

    /**
     * Creates a new Orden model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Orden();
        $model->Venta_id=$id;
        $model->Finalizada= 0;
        $model->Entregada = 0;
        $model->Descuento =0;
        $model->Total=0;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['creates', 'id' => $model->id,'reid' => 0, 'liid' => 0, 'ldid' => 0, 'arid'=>0, 'ido' => $id]);
        }

        return $this->render('create', [
            'model' => $model,
            'id' => $id,
        ]);
    }
    public function actionCreates($id, $reid, $liid, $ldid, $arid, $ido)
    {
        $model = $this->findModel($id);
        $model1 = null;
        $model2 = null;
        $model23 = null;
        $model3 = null;
        $model4 = null;
        $model31 = null;
        $model41 = null;
        if($reid != 0)
        {
            $model->Receta_id = $reid;
            $model1 = Receta::findOne($model->Receta_id);   
        }
        if($liid != 0)
        {
            $model->Lentei_id = $liid;
            $model3 = Detalleorden::findOne($model->Lentei_id);
            if($model3->Lentesterm_id != null)
            {
                $model31 = Lentesterm::findOne($model3->Lentesterm_id);
            }   
            else
            {
                $model31 = Lenteterm::findOne($model3->Lenteterm_id);
            }   
        }
        if($ldid != 0)
        {
            $model->Lented_id = $ldid;
             $model4 = Detalleorden::findOne($model->Lented_id);    
             if($model4->Lentesterm_id != null)
            {
                $model41 = Lentesterm::findOne($model4->Lentesterm_id);
            }   
            else
            {
                $model41 = Lenteterm::findOne($model4->Lenteterm_id);
            }
        }
        if($arid != 0)
        {
            $model->Aro_id = $arid;
             $model2 = Detalleorden::findOne($model->Aro_id); 
             $model23 = Aro::findOne($model2->Aro_id); 
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['venta/creates', 'id' => $ido]);
        }

        return $this->render('creates', [
            'model' => $model,
            'id' => $id,
            'ido' => $ido,
            'reid' => $reid,
            'liid' => $liid,
            'ldid' => $ldid,
            'arid' => $arid,
            'model1' => $model1,
            'model2' => $model2,
            'model23' => $model23,
            'model31' => $model31,
            'model3' => $model3,
             'model41' => $model41,
            'model4' => $model4,
        ]);
    }
    /**
     * Updates an existing Orden model.
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
     * Deletes an existing Orden model.
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
     * Finds the Orden model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Orden the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Orden::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
