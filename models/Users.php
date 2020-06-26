<?php

namespace app\models;

use kartik\password\StrengthValidator;
use app\models\Segurancausers;
use yii\web\IdentityInterface;

use Yii;


/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int $nivel
 * @property int|null $primeiro_acesso
 * @property string $password
 * @property string $create_at
 *
 * @property Aprovador[] $aprovadors
 * @property Workflowaprovacao[] $workflowaprovacaos
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    public $username;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'nivel', 'password'], 'required'],
            [['nivel', 'primeiro_acesso'], 'integer'],
            [['create_at'], 'safe'],
            [['name', 'email', 'password'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'nivel' => 'Nivel',
            'primeiro_acesso' => 'Primeiro Acesso',
            'password' => 'Password',
            'create_at' => 'Criação',
        ];
    }


    public function getNivelLabel(){
        if($this->nivel == 0){
            return 'Normal';
        }
        else{
            return 'Administrador';
        }
    }


    
    public function beforeSave($data) {
        
        if (isset($this->password)) { 
            $this->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);
        }
        
        return parent::beforeSave($data);
    }

    public static function findIdentity($id){
		return static::findOne($id);
	}
 
	public static function findIdentityByAccessToken($token, $type = null){
		throw new NotSupportedException();//I don't implement this method because I don't have any access token column in my database
	}
 
	public function getId(){
		return $this->id;
    }
    
    public function getNome(){
		return $this->name;
	}
 
	public function getAuthKey(){
		//return $this->authKey;//Here I return a value of my authKey column
		//throw new NotSupportedException();
	}
 
	public function validateAuthKey($authKey){
		//return $this->authKey === $authKey;
	//	throw new NotSupportedException();
	}
	
	public static function findByUsername($username){

		return self::findOne(['email'=> $username]);
	}
 
	public function validatePassword($password){
	
	    return $this->password === $password;
	}

    /**
     * Gets query for [[Aprovadors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAprovadors()
    {
        return $this->hasMany(Aprovador::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Workflowaprovacaos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWorkflowaprovacaos()
    {
        return $this->hasMany(Workflowaprovacao::className(), ['aprovador' => 'id']);
    }
}
