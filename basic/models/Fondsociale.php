<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fondsociale".
 *
 * @property string $id
 * @property string $matMembre
 * @property string $montant
 * @property string $date
 * @property string $delais
 *
 * @property Membre $matMembre0
 */
class Fondsociale extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fondsociale';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['matMembre', 'montant', 'date', 'delais'], 'required','message'=>'{attribute} ne peut pas etre vide'],
            [['montant'], 'number'],
            [['date', 'delais'], 'safe'],
            [['matMembre'], 'string', 'max' => 10],
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
            'delais' => 'Delais',
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
