<?php

namespace app\controllers;

use Yii;
use app\models\Entrada;
use app\models\EntradaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Lentesterm;
use app\models\Lenteterm;
use app\models\Aro;
use app\models\Accesorios;
use app\models\Materiall;
use app\models\Materiala;
use app\models\Marca;
use app\models\Tipo;
use app\models\Mobyequipo;
use app\models\Depreciacion;
use app\models\Empleado;

/**
 * EntradaController implements the CRUD actions for Entrada model.
 */
class EntradaController extends Controller
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
     * Lists all Entrada models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EntradaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Entrada model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $inv)
    {
        $model11 = null;
        $model12 = null;
        $model21 = null;
        $model22 = null;
        $model41 = null;
        $model42 = null;
        $model = $this->findModel($id);
        $model1 = Lenteterm::findOne($model->Lenteterm_id);
        if($model->Lenteterm_id != null)
        {

        $model11 = Materiall::findOne($model1->Material_id);
        $model12 = Tipo::findOne($model1->Tipo_id);
        }
        $model2 = Lentesterm::findOne($model->Lentesterm_id);
        if($model->Lentesterm_id != null)
        {
            
        $model21 = Materiall::findOne($model2->Material_id);
        $model22 = Tipo::findOne($model2->Tipo_id);
        }
        $model3 = Accesorios::findOne($model->Accesorios_id);
        $model4 = Aro::findOne($model->Aro_id);
        if($model->Aro_id != null)
        {
            
        $model41 = Materiala::findOne($model4->Marca_id);
        $model42 = Marca::findOne($model4->Material_id); 
        }
        $model5 = Mobyequipo::findOne($model->Mobyequipo_id);
        
        return $this->render('view', [
             'model' => $model,
            'model1' => $model1,
            'model11' => $model11,
            'model12' => $model12,
            'model2' => $model2,
            'model21' => $model21,
            'model22' => $model22,
            'model3' => $model3,
            'model4' => $model4,
            'model41' => $model41,
            'model42' => $model42,
            'model5' => $model5,
            'inv' => $inv,
        ]);
    }

    /**
     * Creates a new Entrada model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id, $inv)
    {
        $model = new Entrada();
        if($id != 0)
            {
                $model->Mobyequipo_id = $id;
            }
        $mobs = [];
        $tmp = Mobyequipo::find()->all();
        foreach ($tmp as $mob) {
            $tmob = Depreciacion::findOne($mob->Depreciacion_id); 
            $mobs[$mob->id]="Descripcion: ".$mob->Descripcion."; Tipo: ".$tmob->Nombre;
        }
        $emps = [];
        $tmp1 = Empleado::find()->all();
        foreach ($tmp1 as $emp) {
            $emps[$emp->id]="Nombre: ".$emp->Nombre;
        }
        if($inv == 1)
        {
            
                
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['mobyequipo/index']);
            }

            return $this->render('create', [
                'model' => $model,
                'inv' => $inv,
                'mobs' => $mobs,
                'emps' => $emps,
            ]);
               
        }
    }
    
    public function actionCreateinlst($id)
    {
        $model = new Entrada();
        if($id != 0)
        {
            $model->Lentesterm_id = $id;
        }
        $lentes = [];
        $tmp = Lentesterm::find()->all();
        foreach ($tmp as $lente) {
            $material = Materiall::findOne($lente->Material_id); 
            $lentes[$lente->id]="Graduacion base: ".$lente->Graduacion_base."; Material: ".$material->Material;
        }
        $emps = [];
       $tmp1 = Empleado::find()->all();
        foreach ($tmp1 as $emp) {
            $emps[$emp->id]="Nombre: ".$emp->Nombre;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['inventario/mercaderia']);
        }

        return $this->render('createinlst', [
            'model' => $model,
            'lentes'=> $lentes,
            'emps' => $emps,
        ]);
    }
     public function actionCreateinlt($id)
    {
        $model = new Entrada();
        if($id != 0)
        {
            $model->Lenteterm_id = $id;
        }
        $lentes = [];
        $tmp = Lenteterm::find()->all();
        foreach ($tmp as $lente) {
            $material = Materiall::findOne($lente->Material_id);
            $tipo = Tipo::findOne($lente->Tipo_id);
            $lentes[$lente->id]="Graduacion base: ".$lente->Graduacion_base."; Graduacion excedente: ".$lente->Graduacion_excedente."; Material: ".$material->Material."; Tipo:".$tipo->Tipo;
        }
        $emps = [];
        $tmp1 = Empleado::find()->all();
        foreach ($tmp1 as $emp) {
            $emps[$emp->id]="Nombre: ".$emp->Nombre;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['inventario/mercaderia']);
        }

        return $this->render('createinlt', [
            'model' => $model,
            'lentes'=> $lentes,
            'emps' => $emps,
        ]);
    }
    public function actionCreateinar($id)
    {
        $model = new Entrada();
        if($id != 0)
        {
            $model->Aro_id = $id;
        }
        $aros = [];
        $tmp = Aro::find()->all();
        foreach ($tmp as $aro) {
            $material = Materiala::findOne($aro->Material_id);
            $marca = Marca::findOne($aro->Marca_id);
            $aros[$aro->id]="Marca: ".$marca->Nombre."; Codigo: ".$aro->Codigo."; Material: ".$material->Nombre;
        }
        $emps = [];
        $tmp1 = Empleado::find()->all();
        foreach ($tmp1 as $emp) {
            $emps[$emp->id]="Nombre: ".$emp->Nombre;
        }

        return $this->render('createinar', [
            'model' => $model,
            'aros'=> $aros,
            'emps' => $emps,
        ]);
    }
    public function actionCreateinacc($id)
    {
        $model = new Entrada();
        if($id != 0)
        {
            $model->Accesorios_id = $id;
        }
        $acces = [];
        $tmp = Accesorios::find()->all();
        foreach ($tmp as $acce) {
            $acces[$acce->id]="Nombre: ".$acce->Nombre."; Descripcion: ".$acce->Descripcion;
        }
        $emps = [];
        $tmp1 = Empleado::find()->all();
        foreach ($tmp1 as $emp) {
            $emps[$emp->id]="Nombre: ".$emp->Nombre;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['inventario/mercaderia']);
        }

        return $this->render('createinacc', [
            'model' => $model,
            'acces'=> $acces,
            'emps' => $emps,
        ]);
    }

    /**
     * Updates an existing Entrada model.
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
     * Deletes an existing Entrada model.
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
     * Finds the Entrada model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Entrada the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Entrada::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
