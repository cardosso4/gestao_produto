<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "workflowaprovacao".
 *
 * @property int $id
 * @property int $produto_id
 * @property int $aprovador_id
 * @property int $situacao
 * @property string|null $observacao
 * @property string $create_at
 *
 * @property Aprovador $aprovador
 * @property Produtos $produto
 */
class Workflowaprovacao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'workflowaprovacao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['produto_id', 'aprovador_id', 'situacao'], 'required'],
            [['produto_id', 'aprovador_id', 'situacao'], 'integer'],
            [['observacao'], 'string'],
            [['create_at'], 'safe'],
            [['aprovador_id'], 'exist', 'skipOnError' => true, 'targetClass' => Aprovador::className(), 'targetAttribute' => ['aprovador_id' => 'id']],
            [['produto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Produtos::className(), 'targetAttribute' => ['produto_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'produto_id' => 'Produto ID',
            'aprovador_id' => 'Aprovador ID',
            'situacao' => 'Situacao',
            'observacao' => 'Observacao',
            'create_at' => 'Create At',
        ];
    }

    public function getSituacaoLabel(){
        if($this->situacao == 0){
            return 'Pendente, em análise';
        }
        elseif($this->situacao == 1){
            return 'Aprovado';
        }
        elseif($this->situacao == 2){
            return 'Reprovado';
        }
    }

    /**
     * Gets query for [[Aprovador]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAprovador()
    {
        return $this->hasOne(Aprovador::className(), ['id' => 'aprovador_id']);
    }

    /**
     * Gets query for [[Produto]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduto()
    {
        return $this->hasOne(Produtos::className(), ['id' => 'produto_id']);
    }
}
