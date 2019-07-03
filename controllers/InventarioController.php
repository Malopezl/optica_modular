<?php

namespace app\controllers;
use Yii;
use app\models\Marca;
use app\models\MarcaSearch;
use app\models\Materiala;
use app\models\MaterialaSearch;
use app\models\Materiall;
use app\models\MateriallSearch;
use app\models\Tipo;
use app\models\TipoSearch;
use app\models\Accesorios;
use app\models\AccesoriosSearch;
use app\models\Lentesterm;
use app\models\LentestermSearch;
use app\models\Aro;
use app\models\AroSearch;
use app\models\Lenteterm;
use app\models\LentetermSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Depreciacion;
use app\models\DepreciacionSearch;
use app\models\Entrada;
use app\models\Salida;
use app\models\EntradaSearch;
use app\models\SalidaSearch;
use Jaspersoft\Client\Client;
class InventarioController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        return $this->render('index');
    }

    public function actionMercaderia()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
       $searchModel = new LentestermSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModel1 = new LentetermSearch();
        $dataProvider1 = $searchModel1->search(Yii::$app->request->queryParams);
        $searchModel2 = new AroSearch();
        $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);
        $searchModel3 = new AccesoriosSearch();
        $dataProvider3 = $searchModel3->search(Yii::$app->request->queryParams);

        return $this->render('mercaderia', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModel1' => $searchModel1,
            'dataProvider1' => $dataProvider1,
            'searchModel2' => $searchModel2,
            'dataProvider2' => $dataProvider2,
            'searchModel3' => $searchModel3,
            'dataProvider3' => $dataProvider3,
        ]);
    }
    public function actionDetalles()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $searchModel = new MarcaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModel1 = new MaterialaSearch();
        $dataProvider1 = $searchModel1->search(Yii::$app->request->queryParams);
        $searchModel2 = new MateriallSearch();
        $dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);
        $searchModel3 = new TipoSearch();
        $dataProvider3 = $searchModel3->search(Yii::$app->request->queryParams);
        $searchModel4 = new DepreciacionSearch();
        $dataProvider4 = $searchModel4->search(Yii::$app->request->queryParams);
        return $this->render('detalles',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModel1' => $searchModel1,
            'dataProvider1' => $dataProvider1,
            'searchModel2' => $searchModel2,
            'dataProvider2' => $dataProvider2,
            'searchModel3' => $searchModel3,
            'dataProvider3' => $dataProvider3,
            'searchModel4' => $searchModel4,
            'dataProvider4' => $dataProvider4,
        ]);
    }
    public function actionIngeg()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $searchModel = new EntradaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModel1 = new SalidaSearch();
        $dataProvider1 = $searchModel1->search(Yii::$app->request->queryParams);
        return $this->render('ingeg',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModel1' => $searchModel1,
            'dataProvider1' => $dataProvider1,

        ]);
    }


    public function actionReporte() {
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
            );

            /* el nomrepo es para el nombre que va a devolver al pdf que se genere*/
    $nomrepo = 'Inventario-'.'_'.date("Y-m-d H:i:s").'.pdf';
    $report = $c->reportService()->runReport('/reports/Optica/Rinventario', 'pdf', null, null, $inputControls);

    /*aca podes cambiar si queres un excel o un docx o algo así*/
    $options = ['Content-Type'=>'application/pdf','inline'=>true,'Content-Disposition'=> 'inline'];
    Yii::$app->response->setDownloadHeaders($nomrepo,'application/pdf',true);

    /*esto devuelve el pdf, y lo visualizaras en el navegador en una ventana nueva, para eso sirvio
    el javascript que agregamos al inicio para abrirnos una nueva ventana. */
    return Yii::$app->response->sendContentAsFile( $report,$nomrepo,$options);


  }
}