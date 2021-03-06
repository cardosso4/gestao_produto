<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Produtos;

/**
 * ProdutosSearch represents the model behind the search form of `app\models\Produtos`.
 */
class ProdutosSearch extends Produtos
{

    public $pesquisar;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'situacao'], 'integer'],
            [['codigo', 'descricao', 'narrativa', 'create_at','pesquisar'], 'safe'],
            [['valor'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Produtos::find();


        

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions

        if(isset($params['valor'])){
            $valor = explode(',',$params['valor']);

            $query->andFilterWhere(['>=', 'valor', $valor[0]])
            ->andFilterWhere(['<=', 'valor', $valor[1]]);
        }

        $query->andFilterWhere(['situacao' => $this->situacao]);

        $query->orFilterWhere(['like', 'codigo', $this->pesquisar])
            ->orFilterWhere(['like', 'descricao', $this->pesquisar]);
            
        return $dataProvider;
    }
}
