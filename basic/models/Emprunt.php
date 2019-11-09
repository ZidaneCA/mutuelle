<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "emprunt".
 *
 * @property string $id
 * @property string $matMembre
 * @property string $montant
 * @property string $dateEmp
 * @property string $delais
 * @property string $matExp
 *
 * @property Membre $matMembre0
 * @property Interets[] $interets
 * @property Rembourse[] $rembourses
 */
class Emprunt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'emprunt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['matMembre', 'montant', 'dateEmp', 'delais', 'matExp'], 'required','message'=>'{attribute} ne peut pas etre vide'],
            [['montant'], 'number'],
            [['dateEmp', 'delais'], 'safe'],
            [['matMembre', 'matExp'], 'string', 'max' => 10],
            [['matMembre'], 'exist', 'skipOnError' => true, 'targetClass' => Membre::className(), 'targetAttribute' => ['matMembre' => 'mat']],
            ['montant','validateMontant'],
        ];
    }

    public function validateMontant($attribute, $params){
        if(!$this->hasErrors()){
            $Tamount =  Yii::$app->db->createCommand('SELECT SUM(montant) as "Tamount" from epargne')->queryScalar();
            if($this->montant > $Tamount){
                $this->addError( $attribute, "Le montant solicite est superieure au montant en caisse(".$Tamount.")");
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'matMembre' => 'Mat Membre',
            'montant' => 'Montant',
            'dateEmp' => 'Date Emp',
            'delais' => 'Delais',
            'matExp' => 'Mat Exp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatMembre0()
    {
        return $this->hasOne(Membre::className(), ['mat' => 'matMembre']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterets()
    {
        return $this->hasMany(Interets::className(), ['idEmp' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRembourses()
    {
        return $this->hasMany(Rembourse::className(), ['idEmp' => 'id']);
    }
}
