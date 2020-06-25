<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produtos".
 *
 * @property int $id
 * @property string $codigo
 * @property string $descricao
 * @property float|null $valor
 * @property int $situacao
 * @property string|null $narrativa
 * @property string $create_at
 */
class Produtos extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produtos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'descricao', 'situacao'], 'required'],
            [['valor'], 'number'],
            [['situacao'], 'integer'],
            [['narrativa'], 'string'],
            [['create_at'], 'safe'],
            [['codigo'], 'string', 'max' => 60],
            [['descricao'], 'string', 'max' => 120],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo' => 'Codigo',
            'descricao' => 'Descricao',
            'valor' => 'Valor',
            'situacao' => 'Situacao',
            'narrativa' => 'Narrativa',
            'create_at' => 'Criação',
        ];
    }


    public function getSituacaoLabel(){
        if($this->situacao == 0){
            return 'Não avaliado';
        }
        elseif($this->situacao == 1){
            return 'Aprovado';
        }
        elseif($this->situacao == 2){
            return 'Reprovado';
        }
    }

}
