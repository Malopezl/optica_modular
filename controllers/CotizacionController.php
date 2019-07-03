<?php

namespace app\controllers;

use Yii;
use app\models\Cotizacion;
use app\models\CotizacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Detallecotizacion;
use app\models\DetallecotizacionSearch;
use app\models\Empleado;

use Jaspersoft\Client\Client;
/**
/**
 * CotizacionController implements the CRUD actions for Cotizacion model.
 */
class CotizacionController extends Controller
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
     * Lists all Cotizacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $searchModel = new CotizacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cotizacion model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
         $model = $this->findModel($id);
        $searchModel = new DetallecotizacionSearch();
        $searchModel->Cotizacion_id = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('view', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Cotizacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new Cotizacion();
        $model->Total = 0;
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
            'emps' => $emps,
        ]);
    }
    public function actionCreates($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = $this->findModel($id);
        $searchModel = new DetallecotizacionSearch();
        $searchModel->Cotizacion_id = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('creates', [
            'model' => $model,
            'id' => $id,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Updates an existing Cotizacion model.
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
     * Deletes an existing Cotizacion model.
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
     * Finds the Cotizacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cotizacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cotizacion::findOne($id)) !== null) {
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
            'idcot' => $id,
            );

            /* el nomrepo es para el nombre que va a devolver al pdf que se genere*/
    $nomrepo = 'Inventario-'.'_'.date("Y-m-d H:i:s").'.pdf';
    $report = $c->reportService()->runReport('/reports/Optica/Cotizacion', 'pdf', null, null, $inputControls);

    /*aca podes cambiar si queres un excel o un docx o algo así*/
    $options = ['Content-Type'=>'application/pdf','inline'=>true,'Content-Disposition'=> 'inline'];
    Yii::$app->response->setDownloadHeaders($nomrepo,'application/pdf',true);

    /*esto devuelve el pdf, y lo visualizaras en el navegador en una ventana nueva, para eso sirvio
    el javascript que agregamos al inicio para abrirnos una nueva ventana. */
    return Yii::$app->response->sendContentAsFile( $report,$nomrepo,$options);


  }
}