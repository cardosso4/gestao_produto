<?php

namespace app\models;

use yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Workflowaprovacao;

/**
 * WorkflowaprovacaoSearch represents the model behind the search form of `app\models\Workflowaprovacao`.
 */
class WorkflowaprovacaoSearch extends Workflowaprovacao
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'produto_id', 'aprovador_id', 'situacao'], 'integer'],
            [['observacao', 'create_at'], 'safe'],
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
        $query = Workflowaprovacao::find();
        $query->LeftJoin('aprovador', 'aprovador.id = workflowaprovacao.aprovador_id');

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


        $query->andFilterWhere(['workflowaprovacao.situacao' => $this->situacao]);

        $user_id = Yii::$app->user->getId();

        $query->andFilterWhere(['aprovador.user_id' => $user_id]);

        return $dataProvider;
    }
}
