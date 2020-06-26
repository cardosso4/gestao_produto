<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WorkflowaprovacaoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aprovar Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>

<main class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
        <div class="workflowaprovacao-index">

            <h1><?= Html::encode($this->title) ?></h1>

            <?php echo $this->render('_search', ['model' => $searchModel]); ?>

            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        //'id',
                        [
                            'label' => 'Produto',
                            'value' => function($data){
                                return $data->produto->codigo.'-'.$data->produto->descricao;
                            }
                        ],
                        [
                            'label' => 'Aprovador',
                            'value' => function($data){
                                return $data->aprovador->user->name;
                            }
                        ],
                        [
                            'label' => 'Stuacao',
                            'attribute' => 'situacaoLabel' 
                        ],

                        [
                            'label' => '',
                            'format' => 'raw',
                            'value' => function($data){

                                return Html::a(' <span class="glyphicon glyphicon-check"></span>', ['/workflowaprovacao/update', 'id' => $data->id], ['title' => "Analise", 'aria-label' => "View", 'data-pjax' => "0"]);
              
    
                            }
                        ],   
                        
                    // 'observacao:ntext',
                        //'create_at',

                        //['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>

        </div>
    </div>
</main>
