<?php

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;

class CventasController extends \yii\web\Controller
{
    public function actionIndex()
    {
    	if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        else
        {
           	return $this->render('index'); 
        }
        
    }

}
