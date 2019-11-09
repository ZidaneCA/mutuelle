<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rembourse".
 *
 * @property string $id
 * @property string $idEmp
 * @property string $montant
 * @property string $date
 * @property string $matPercept
 *
 * @property Emprunt $emp
 */
class Rembourse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rembourse';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEmp', 'montant', 'date', 'matPercept'], 'required','message'=>'{attribute} ne peut pas etre vide'],
            [['idEmp'], 'integer'],
            [['montant'], 'number'],
            [['date'], 'safe'],
            [['matPercept'], 'string', 'max' => 10],
            [['idEmp'], 'exist', 'skipOnError' => true, 'targetClass' => Emprunt::className(), 'targetAttribute' => ['idEmp' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idEmp' => 'Id Emp',
            'montant' => 'Montant',
            'date' => 'Date',
            'matPercept' => 'Mat Percept',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmp()
    {
        return $this->hasOne(Emprunt::className(), ['id' => 'idEmp']);
    }
}
