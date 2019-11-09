<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "epargne".
 *
 * @property string $id
 * @property string $matMembre
 * @property string $montant
 * @property string $date
 * @property string $matPercept
 *
 * @property Membre $matMembre0
 */
class Epargne extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'epargne';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['matMembre', 'montant', 'date', 'matPercept'], 'required','message'=>'{attribute} ne peut pas etre vide'],
            [['montant'], 'number'],
            [['date'], 'safe'],
            [['matMembre', 'matPercept'], 'string', 'max' => 10],
            [['matMembre'], 'exist', 'skipOnError' => true, 'targetClass' => Membre::className(), 'targetAttribute' => ['matMembre' => 'mat']],
        ];
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
            'date' => 'Date',
            'matPercept' => 'Mat Percept',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMatMembre0()
    {
        return $this->hasOne(Membre::className(), ['mat' => 'matMembre']);
    }
}
