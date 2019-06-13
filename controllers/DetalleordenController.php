<?php

namespace app\controllers;

use Yii;
use app\models\Detalleorden;
use app\models\DetalleordenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Lentesterm;
use app\models\Lenteterm;
use app\models\Aro;
use app\models\Materiall;
use app\models\Materiala;
use app\models\Marca;
use app\models\Tipo;
/**
 * DetalleordenController implements the CRUD actions for Detalleorden model.
 */
class DetalleordenController extends Controller
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
     * Lists all Detalleorden models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DetalleordenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Detalleorden model.
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
     * Creates a new Detalleorden model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id, $reid, $liid, $ldid, $arid, $ido, $op)
    {
        $model = new Detalleorden();
       $lentes = [];
        $tmp = Lentesterm::find()->all();
        foreach ($tmp as $lente) {
            $material = Materiall::findOne($lente->Material_id); 
            $lentes[$lente->id]="Graduacion base: ".$lente->Graduacion_base."Material: ".$material->Material;
        }
        $lentes1 = [];
        $tmp1 = Lenteterm::find()->all();
        foreach ($tmp1 as $lente1) {
            $material1 = Materiall::findOne($lente->Material_id);
            $tipo1 = Tipo::findOne($lente->Tipo_id);
            $lentes1[$lente1->id]="Graduacion base: ".$lente1->Graduacion_base."; Graduacion excedente: ".$lente1->Graduacion_excedente."; Material: ".$material1->Material."; Tipo:".$tipo1->Tipo;
        }
        $aros = [];
        $tmp2 = Aro::find()->all();
        foreach ($tmp2 as $aro) {
            $material = Materiala::findOne($aro->Material_id);
            $marca = Marca::findOne($aro->Marca_id);
            $aros[$aro->id]="Marca: ".$marca->Nombre."; Codigo: ".$aro->Codigo."; Material: ".$material->Nombre;
        }
         
        if($op == 11 || $op == 12)
        {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['orden/creates', 'id' => $id,'reid' => $reid, 'liid' => $model->id, 'ldid' => $ldid, 'arid'=>$arid, 'ido' => $ido]);
        }
        }
        else if($op == 21 || $op == 22)
        {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['orden/creates', 'id' => $id,'reid' => $reid, 'liid' => $liid, 'ldid' => $model->id, 'arid'=>$arid, 'ido' => $ido]);
        }
        }
        else if($op == 3)
        {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['orden/creates', 'id' => $id,'reid' => $reid, 'liid' => $liid, 'ldid' => $ldid, 'arid'=>$model->id, 'ido' => $ido]);
        }
        }

        return $this->render('create', [
            'model' => $model,
            'id' => $id,
            'ido' => $ido,
            'reid' => $reid,
            'liid' => $liid,
            'ldid' => $ldid,
            'arid' => $arid,
            'op' => $op,
            'lentes'=> $lentes,
            'lentes1'=> $lentes1,
            'aros'=> $aros,

        ]);
    }

    /**
     * Updates an existing Detalleorden model.
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
     * Deletes an existing Detalleorden model.
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
     * Finds the Detalleorden model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Detalleorden the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Detalleorden::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
