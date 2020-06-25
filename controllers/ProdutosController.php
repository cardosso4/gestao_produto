<?php

namespace app\controllers;

use Yii;
use app\models\Produtos;
use app\models\UploadForm;
use app\models\ProdutosSearch;

use yii\web\Controller;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;


/**
 * ProdutosController implements the CRUD actions for Produtos model.
 */
class ProdutosController extends Controller
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
     * Lists all Produtos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProdutosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Produtos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Produtos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Produtos();
        $modelupload = new UploadForm();

        $post = Yii::$app->request->post();

        if($post){

            $model->load($post);
            $model->situacao = 0;

            if(Yii::$app->request->isPost && UploadedFile::getInstance($modelupload, 'imageFile')){

                $modelupload->imageFile = UploadedFile::getInstance($modelupload, 'imageFile');

                $diretorio = \Yii::getAlias('@webroot');
                $diretorio = $diretorio.'/repositorio/imagem';
    
                if(is_dir($diretorio) != 1){
                    mkdir($diretorio, 0777, true);
                }

                $modelupload->upload($diretorio);

                $model->imagem = '/repositorio/imagem/'.strtolower(str_replace(' ','',UploadedFile::getInstance($modelupload, 'imageFile')->name));
            }

            $model->save();

            return $this->redirect(['index']);
            
        }else{
            return $this->render('create', [
                'model' => $model,
                'modelupload' => $modelupload
            ]);            
        }

    }

    /**
     * Updates an existing Produtos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelupload = new UploadForm();

        $post = Yii::$app->request->post();

        if($post){

            $model->load($post);
            $model->situacao = 0;

            if(Yii::$app->request->isPost && UploadedFile::getInstance($modelupload, 'imageFile')){

                $modelupload->imageFile = UploadedFile::getInstance($modelupload, 'imageFile');

                $diretorio = \Yii::getAlias('@webroot');
                $diretorio = $diretorio.'/repositorio/imagem';
    
                if(is_dir($diretorio) != 1){
                    mkdir($diretorio, 0777, true);
                }

                $modelupload->upload($diretorio);

                $model->imagem = '/repositorio/imagem/'.strtolower(str_replace(' ','',UploadedFile::getInstance($modelupload, 'imageFile')->name));
            }

            $model->save();

            return $this->redirect(['index']);
            
        }else{
            return $this->render('update', [
                'model' => $model,
                'modelupload' => $modelupload
            ]);
        }

    }

    /**
     * Deletes an existing Produtos model.
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
     * Finds the Produtos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Produtos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Produtos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
