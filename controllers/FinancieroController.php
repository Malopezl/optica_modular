<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
class FinancieroController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
