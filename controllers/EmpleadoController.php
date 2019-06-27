<?php

namespace app\controllers;

use Yii;
use app\models\Empleado;
use app\models\EmpleadoSearch;
use app\models\Contratacion;
use app\models\Profesion;
use app\models\Cargo;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\FormUpload;
use yii\helpers\Html;

/**
 * EmpleadoController implements the CRUD actions for Empleado model.
 */
class EmpleadoController extends Controller
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
     * Lists all Empleado models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpleadoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Empleado model.
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
        $searchModel = new EmpleadoSearch();
        $searchModel->id = $id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('view', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Empleado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /**public function actionCreate()
    {
        $model = new Empleado();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }*/
    public function actionCreate($id)
    {
        $model = new Empleado();
         Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/archivos/cvs';
        $conts = [];
        $tmp = Contratacion::find()->all();
        foreach ($tmp as $cont) {
            $conts[$cont->id]="Nombre contrato: ".$cont->Contrato;
        }
        $profs = [];
        $temp = Profesion::find()->all();
        foreach ($temp as $prof) { 
            $profs[$prof->id]="Profesion: ".$prof->Nombre;
        }
        $cargs = [];
        $tem = Cargo::find()->all();
        foreach ($tem as $carg) { 
            $cargs[$carg->id]="Cargo: ".$carg->Nombre;
        }

        if ($model->load(Yii::$app->request->post())) {
            
            $model->file = UploadedFile::getInstance($model, 'file');
            $file = $model->file;
            $model->Cv=$file->name;

            if ($model->save()){

                if ($model->file && $model->validate()) {
                 $file->saveAs('archivos/cvs/' . $file->baseName . '.' . $file->extension);
                }

                  return $this->redirect(['index']);
                 
        }
    }
        return $this->render('create', [
            'model' => $model,
            'conts' => $conts,
            'profs' => $profs,
            'cargs' => $cargs,
        ]);
    
    }

    /**
     * Updates an existing Empleado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
       $model = $this->findModel($id);
         Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/archivos/cvs';
        $conts = [];
        $tmp = Contratacion::find()->all();
        foreach ($tmp as $cont) {
            $conts[$cont->id]="Nombre contrato: ".$cont->Contrato;
        }
        $profs = [];
        $temp = Profesion::find()->all();
        foreach ($temp as $prof) { 
            $profs[$prof->id]="Profesion: ".$prof->Nombre;
        }
        $cargs = [];
        $tem = Cargo::find()->all();
        foreach ($tem as $carg) { 
            $cargs[$carg->id]="Cargo: ".$carg->Nombre;
        }

        if ($model->load(Yii::$app->request->post())) {
            
            $model->file = UploadedFile::getInstance($model, 'file');
            $file = $model->file;
            $model->Cv=$file->name;

            if ($model->save()){

                if ($model->file && $model->validate()) {
                 $file->saveAs('archivos/cvs/' . $file->baseName . '.' . $file->extension);
                }
                  return $this->redirect(['index']);
        }
    }

        return $this->render('update', [
            'model' => $model,
            'conts' => $conts,
            'profs' => $profs,
            'cargs' => $cargs,
        ]);
    }

    /**
     * Deletes an existing Empleado model.
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
     * Finds the Empleado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Empleado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Empleado::findOne($id)) !== null) {
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
   if (!$this->downloadFile("archivos/cvs/", Html::encode($_GET["file"]), ["pdf"]))
   {
    //Mensaje flash para mostrar el error
    Yii::$app->session->setFlash("errordownload");
   }
  }
  
  return $this->render("download");
 }

}
