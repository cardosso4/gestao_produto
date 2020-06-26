<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aprovador".
 *
 * @property int $id
 * @property int $user_id
 * @property int $situacao
 * @property string $create_at
 *
 * @property Users $user
 */
class Aprovador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'aprovador';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'situacao'], 'required'],
            [['user_id', 'situacao'], 'integer'],
            [['create_at'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'situacao' => 'situacao',
            'create_at' => 'Criação',
        ];
    }

    public function getSituacaoLabel(){
        if($this->situacao == 0){
            return 'Inativo';
        }
        else{
            return 'Ativo';
        }
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }
}
