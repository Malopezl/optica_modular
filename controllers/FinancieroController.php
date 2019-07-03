<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Bancos;
use app\models\BancosSearch;
use app\models\Caja;
use app\models\CajaSearch;

class FinancieroController extends \yii\web\Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        return $this->render('index');
    }
    public function actionCuentas()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
    	$searchModel = new BancosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $searchModel1 = new CajaSearch();
        $dataProvider1 = $searchModel1->search(Yii::$app->request->queryParams);
        return $this->render('cuentas',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModel1' => $searchModel1,
            'dataProvider1' => $dataProvider1,
        ]);

    }

}
