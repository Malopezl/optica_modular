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

class InventarioController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionMercaderia()
    {
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
}
