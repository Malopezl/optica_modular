<?php

namespace app\controllers;


use Yii;
use app\models\Venta;
use app\models\VentaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Cliente;
use app\models\Orden;
use app\models\OrdenSearch;
use app\models\Detalleventa;
use app\models\DetalleventaSearch;
use app\models\Empleado;
use Jaspersoft\Client\Client;
/**
 * VentaController implements the CRUD actions for Venta model.
 */
class VentaController extends Controller
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
     * Lists all Venta models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $searchModel = new VentaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Venta model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model =$this->findModel($id);
        $searchModel = new OrdenSearch();
        $searchModel->Venta_id=$id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModel1 = new DetalleventaSearch();
        $searchModel1->Venta_id=$id;
        $dataProvider1 = $searchModel1->search(Yii::$app->request->queryParams);
        return $this->render('view', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModel1' => $searchModel1,
            'dataProvider1' => $dataProvider1,
            'id'=> $id,

        ]);
    }

    /**
     * Creates a new Venta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Venta();
        $model->Finalizada = 0;
        //$entregada-> = 0;
        if($id != 0)
        {
            $model->Cliente_id = $id;
        }
        $clts = [];
        $tmp = Cliente::find()->all();
        foreach ($tmp as $clt) {
            $clts[$clt->id]="Nombre: ".$clt->Nombre."; NIT: ".$clt->NIT."; Saldo: ".$clt->Saldo;
        }
        $emps = [];
        $tmp1 = Empleado::find()->all();
        foreach ($tmp1 as $emp) {
            $emps[$emp->id]="Nombre: ".$emp->Nombre;
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['creates', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'clts' => $clts,
            'emps' => $emps,
        ]);
    }
    public function actionCreates($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = $this->findModel($id);
        $searchModel = new OrdenSearch();
        $searchModel->Venta_id=$id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModel1 = new DetalleventaSearch();
        $searchModel1->Venta_id=$id;
        $dataProvider1 = $searchModel1->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['creates', 'id' => $model->id]);
        }

        return $this->render('creates', [
            'model' => $model,
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModel1' => $searchModel1,
            'dataProvider1' => $dataProvider1,
        ]);
    }
    public function actionCreatef($id)
    {   
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = $this->findModel($id);
        
        $clts = [];
        $tmp = Cliente::find()->all();
        foreach ($tmp as $clt) {
            $clts[$clt->id]="Nombre: ".$clt->Nombre."; NIT: ".$clt->NIT."; Saldo: ".$clt->Saldo;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('createf', [
            'model' => $model,
            'clts' => $clts,
        ]);
    }

    /**
     * Updates an existing Venta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Venta model.
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
     * Finds the Venta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Venta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Venta::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
public function actionReporte($id) {
/*
    $tmporden=Orden::find()->where(['id_orden'=>$id])->one();
    if ($tmporden->resultado_completo==0){
        $tmporden->resultado_completo=1;
        $tmporden->save();
    }*/
/* esta es la parte importante con las credenciales. */
    $c = new \Jaspersoft\Client\Client(
            "http://localhost:8080/jasperserver",
            "jasperadmin",
            "jasperadmin"
          );    
    $c->setRequestTimeout(60);    

    /* aca mandas a llamar al reporte que querras usar*/
    
      $nomjasperreport='reports/optica/rinventario';
    
/* aca estoy mandando los datos que puse, ese subreportdir es porque cree una carpeta dentro del jasperserver que se llama labcastillo
la parte de la ext es porque los reportes son de extensión .jasper, pero yo el nombre que les coloque fue sin la 
extensión por eso esa variable*/
    $inputControls = array(
            'flid' => $id,
            );

            /* el nomrepo es para el nombre que va a devolver al pdf que se genere*/
    $nomrepo = 'Inventario-'.'_'.date("Y-m-d H:i:s").'.pdf';
    $report = $c->reportService()->runReport('/reports/Optica/ventas', 'pdf', null, null, $inputControls);

    /*aca podes cambiar si queres un excel o un docx o algo así*/
    $options = ['Content-Type'=>'application/pdf','inline'=>true,'Content-Disposition'=> 'inline'];
    Yii::$app->response->setDownloadHeaders($nomrepo,'application/pdf',true);

    /*esto devuelve el pdf, y lo visualizaras en el navegador en una ventana nueva, para eso sirvio
    el javascript que agregamos al inicio para abrirnos una nueva ventana. */
    return Yii::$app->response->sendContentAsFile( $report,$nomrepo,$options);


  }
}
