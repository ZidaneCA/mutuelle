<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parametres".
 *
 * @property string $fondsociale
 * @property string $pourInteret
 * @property int $delaisRem
 * @property int $delaisFS
 */
class Parametres extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parametres';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fondsociale', 'pourInteret', 'delaisRem', 'delaisFS'], 'required','message'=>'{attribute} ne peut pas etre vide'],
            [['fondsociale', 'pourInteret'], 'number'],
            [['delaisRem', 'delaisFS'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fondsociale' => 'Fondsociale',
            'pourInteret' => 'Pour Interet',
            'delaisRem' => 'Delais Rem',
            'delaisFS' => 'Delais Fs',
        ];
    }
}
