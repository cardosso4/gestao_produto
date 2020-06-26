<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Users;

/**
 * UsersSearch represents the model behind the search form of `app\models\Users`.
 */
class UsersSearch extends Users
{

    public $pesquisar;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nivel', 'primeiro_acesso'], 'integer'],
            [['name', 'email', 'password', 'create_at','pesquisar'], 'safe'],
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
        $query = Users::find();

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
        // $query->andFilterWhere([
        //     'id' => $this->id,
        //     'nivel' => $this->nivel,
        //     'aceite_termos' => $this->aceite_termos,
        //     'create_at' => $this->create_at,
        // ]);

        $query->andFilterWhere(['nivel'=> $this->nivel]);

        $query->orFilterWhere(['like', 'name', $this->pesquisar])
             ->orFilterWhere(['like', 'email', $this->pesquisar]);

        return $dataProvider;
    }
}
