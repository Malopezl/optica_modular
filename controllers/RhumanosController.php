<?php

namespace app\controllers;
use Yii;
use app\models\CargoSearch;
use app\models\ProfesionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class RhumanosController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

     public function actionDetalles()
    {
        $searchModel = new CargoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModel1 = new ProfesionSearch();
        $dataProvider1 = $searchModel1->search(Yii::$app->request->queryParams);
     
        return $this->render('detalles',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModel1' => $searchModel1,
            'dataProvider1' => $dataProvider1,
            
        ]);
    }

}