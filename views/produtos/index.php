<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProdutosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<main class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
      <div class="produtos-index">

          <h1><?= Html::encode($this->title) ?></h1>

          <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

          <p>
              <?= Html::a('Criar Produtos', ['create'], ['class' => 'btn btn-success']) ?>
          </p>


          <?= GridView::widget([
              'dataProvider' => $dataProvider,
              //'filterModel' => $searchModel,
              'columns' => [
                  ['class' => 'yii\grid\SerialColumn'],

                // 'id',
                  [
                      'label' => 'Produto',
                      'value' => function($data){
                          return $data->codigo.'-'.$data->descricao;
                      }
                  ],
                  // 'codigo',
                  // 'descricao',
                  [
                      'attribute' => 'valor',
                      'format'=>['decimal', 2],
                  ],
                  // 'valor',
                  [
                      'label' => 'Stuacao',
                      'attribute' => 'situacaoLabel' 
                  ],
                  //'narrativa:ntext',
                  //'create_at',

                  [
                      'label' => '',
                      'format' => 'raw',
                      'value' => function($data){
                          $icon = '<i style="cursor: pointer;" class="glyphicon glyphicon-camera imagem" data-img="'.$data->imagem.'" title="Visualizar imgem" aria-hidden="true"></i>';
                          return  $icon;
                          
                      }
                  ],

                  ['class' => 'yii\grid\ActionColumn'],
              ],
          ]); ?>


      </div>
  </div>
</main>

<!-- Modal -->
<div class="modal fade" id="modal_img" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: url() no-repeat center;height: 350px;background-size: 580px;">
        <img src="" id="img" style="max-width: 500px;max-height: 500px;">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>



