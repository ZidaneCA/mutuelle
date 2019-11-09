<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Parametres;

/**
 * ParametresSearch represents the model behind the search form of `app\models\Parametres`.
 */
class ParametresSearch extends Parametres
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'delaisRem', 'delaisFS'], 'integer'],
            [['fondsociale', 'pourInteret'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Parametres::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'fondsociale' => $this->fondsociale,
            'pourInteret' => $this->pourInteret,
            'delaisRem' => $this->delaisRem,
            'delaisFS' => $this->delaisFS,
        ]);

        return $dataProvider;
    }
}
