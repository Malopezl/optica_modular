<?php

namespace app\controllers;

use Yii;
use app\models\Contratacion;
use app\models\ContratacionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\FormUpload;
use yii\helpers\Html;

/**
 * ContratacionController implements the CRUD actions for Contratacion model.
 */
class ContratacionController extends Controller
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
     * Lists all Contratacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContratacionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Contratacion model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
   public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
        


        $model = $this->findModel($id);
        $searchModel = new ContratacionSearch();
        $searchModel->id = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('view', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    

    /**
     * Creates a new Contratacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

public function actionCreate($inv)
    {
        $model = new Contratacion;
       Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/archivos/contratos';
        if ($model->load(Yii::$app->request->post())) {
            
            $model->file = UploadedFile::getInstance($model, 'file');
            $file = $model->file;
            $model->Contrato=$file->name;

            if ($model->save()){

                if ($model->file && $model->validate()) {
                 $file->saveAs('archivos/contratos/' . $file->baseName . '.' . $file->extension);
                }
                if($inv == 1)
                {
                  return $this->redirect(['empleado/create', 'id' => $model->id]);
                }
                else
                {
                  return $this->redirect(['index']);
                }
        }
    }
        return $this->render('create', [
            'model'=>$model,
            'inv'=> $inv,
        ]);
    }


      /**public function actionCreates($id)
    {
        $model = $this->findModel($id);
        $searchModel = new ContratacionSearch();
        $searchModel->id = $id;
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
    }*/

    /**
     * Updates an existing Contratacion model.
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
     * Deletes an existing Contratacion model.
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
     * Finds the Contratacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Contratacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Contratacion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    private function downloadFile($dir, $file, $extensions)
 {
  //Si el directorio existe
  if (is_dir($dir))
  {
   //Ruta absoluta del archivo
   $path = $dir.$file;
   
   //Si el archivo existe
   if (is_file($path))
   {
    //Obtener información del archivo
    $file_info = pathinfo($path);
    //Obtener la extensión del archivo
    $extension = $file_info["extension"];
    
    if (is_array($extensions))
    {
     //Si el argumento $extensions es un array
     //Comprobar las extensiones permitidas
     foreach($extensions as $e)
     {
      //Si la extension es correcta
      if ($e === $extension)
      {
       //Procedemos a descargar el archivo
       // Definir headers
       $size = filesize($path);
       header("Content-Type: application/force-download");
       header("Content-Disposition: attachment; filename=$file");
       header("Content-Transfer-Encoding: binary");
       header("Content-Length: " . $size);
       // Descargar archivo
       readfile($path);
       //Correcto
       return true;
      }
     }
    }
    
   }
  }
  //Ha ocurrido un error al descargar el archivo
  return false;
 }
 
 public function actionDownload()
 {
  if (Yii::$app->request->get("file"))
  {
   //Si el archivo no se ha podido descargar
   //downloadFile($dir, $file, $extensions=[])
   if (!$this->downloadFile("archivos/contratos/", Html::encode($_GET["file"]), ["pdf"]))
   {
    //Mensaje flash para mostrar el error
    Yii::$app->session->setFlash("errordownload");
   }
  }
  
  return $this->render("download");
 }




}
