<?php

namespace app\controllers;

use Yii;
use app\models\Produtos;
use app\models\Workflowaprovacao;
use app\models\WorkflowaprovacaoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * WorkflowaprovacaoController implements the CRUD actions for Workflowaprovacao model.
 */
class WorkflowaprovacaoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index','view','create','update','delete'],
                'rules' => [
                    [
                        'allow' => true,
                        //'actions' => ['logout'],
                        'roles' => ['@'],
                    ],
                    
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Workflowaprovacao models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new WorkflowaprovacaoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Workflowaprovacao model.
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
     * Creates a new Workflowaprovacao model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Workflowaprovacao();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Workflowaprovacao model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $modelProduto = Produtos::findOne($model->produto_id);

        $post = Yii::$app->request->post();

        if($post){

            $model->load($post);
            
            if($model->save()){

                if($model->situacao == 2){

                    $modelProduto = Produtos::findOne($model->produto_id);
                    $modelProduto->situacao = 2;
                    $modelProduto->save();

                }else{
                    $aprovação = Workflowaprovacao::find()->where(['produto_id' => $model->produto_id])->asArray()->all();

                    $arrAprovadores = array_column($aprovação,'situacao');
                    $arrSum = array_sum($arrAprovadores); 
                    $val = count($arrAprovadores);

                    if($arrSum == $val){
                        $modelProduto = Produtos::findOne($model->produto_id);
                        $modelProduto->situacao = 1;
                        $modelProduto->save();
                    }

                }
                
            }


            return $this->redirect(['index']);

        }else{
            return $this->render('update', [
                'model' => $model,
                'modelProduto' => $modelProduto,
            ]);
        }


    }

    /**
     * Deletes an existing Workflowaprovacao model.
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
     * Finds the Workflowaprovacao model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Workflowaprovacao the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Workflowaprovacao::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
