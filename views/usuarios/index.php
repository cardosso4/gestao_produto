<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuários';
$this->params['breadcrumbs'][] = $this->title;
?>

<main class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
        <div class="users-index">

            <h1><?= Html::encode($this->title) ?></h1>

            <?php echo $this->render('_search', ['model' => $searchModel]); ?>


            
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <p>
                    <?= Html::a('Criar usuários', ['create'], ['class' => 'btn btn-success']) ?>
                </p>
            </div>

            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        //'id',
                        'name',
                        'email:email',
                        [
                            'label' => 'Nivel',
                            'attribute' => 'nivelLabel'
                        ],
                        //'password',
                        //'create_at',
                        [
                            'label' => '',
                            'format' => 'raw',
                            'value' => function($data){
                                return Html::a(' <span class="glyphicon glyphicon-expand"></span>', ['/usuarios/reset', 'id' => $data->id], ['title' => "Resetar senha", 'aria-label' => "View", 'data-pjax' => "0"]);
                            }
                        ],
                        

                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>


        </div>
    </div>
</main>

