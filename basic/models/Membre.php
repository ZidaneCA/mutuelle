<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "membre".
 *
 * @property string $mat
 * @property string $nom
 * @property string $prenom
 * @property string $sex
 * @property int $admin
 * @property string $tel
 * @property string $email
 * @property string $adresse
 * @property string $domicile
 * @property string $photo
 *
 * @property Emprunt[] $emprunts
 * @property Epargne[] $epargnes
 * @property Fondsociale[] $fondsociales
 * @property Interets[] $interets
 */
class Membre extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'membre';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mat', 'nom', 'prenom', 'sex', 'admin', 'tel', 'email', 'adresse', 'domicile', 'photo'], 'required','message'=>'{attribute} ne peut pas etre vide'],
            [['sex'], 'string'],
            [['tel'], 'integer'],
            [['mat'], 'string', 'max' => 10],
            [['nom', 'prenom'], 'string', 'max' => 50],
            [['admin'], 'string', 'max' => 1],
            [['email', 'adresse', 'domicile', 'photo'], 'string', 'max' => 100],
            [['mat'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'mat' => 'Mat',
            'nom' => 'Nom',
            'prenom' => 'Prenom',
            'sex' => 'Sex',
            'admin' => 'Admin',
            'tel' => 'Tel',
            'email' => 'Email',
            'adresse' => 'Adresse',
            'domicile' => 'Domicile',
            'photo' => 'Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmprunts()
    {
        return $this->hasMany(Emprunt::className(), ['matMembre' => 'mat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEpargnes()
    {
        return $this->hasMany(Epargne::className(), ['matMembre' => 'mat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFondsociales()
    {
        return $this->hasMany(Fondsociale::className(), ['matMembre' => 'mat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterets()
    {
        return $this->hasMany(Interets::className(), ['matMembre' => 'mat']);
    }

    /** Implementing methods from interface*/
    public function getAuthKey(){

    }

    public function getId(){
        return $this->mat;
    }

    public function validateAuthKey($authKey){
        return $this->authKey === $authKey;
    }

    public static function findIdentity($id){
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type=null){
        throw new  \yii\base\NotSupportedException();
    }

    public static function findByUsername($username){
        return self::findOne(['nom'=>$username]);
    }

    public function validatePassword($password){
        return $this->mat == $password;
    }

}
