<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Aprovador;

/**
 * AprovadorSearch represents the model behind the search form of `app\models\Aprovador`.
 */
class AprovadorSearch extends Aprovador
{

    public $pesquisar;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'situacao'], 'integer'],
            [['create_at','pesquisar'], 'safe'],
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
        $query = Aprovador::find();
        $query->LeftJoin('users', 'users.id = aprovador.user_id');

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

        $query->andFilterWhere(['situacao'=> $this->situacao]);


        $query->andFilterWhere(['like','name', $this->pesquisar]);

        return $dataProvider;
    }
}
