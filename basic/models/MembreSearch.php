<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Membre;

/**
 * MembreSearch represents the model behind the search form of `app\models\Membre`.
 */
class MembreSearch extends Membre
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mat', 'nom', 'prenom', 'sex', 'admin', 'email', 'adresse', 'domicile', 'photo'], 'safe'],
            [['tel'], 'integer'],
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
        $query = Membre::find();

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
            'tel' => $this->tel,
        ]);

        $query->andFilterWhere(['like', 'mat', $this->mat])
            ->andFilterWhere(['like', 'nom', $this->nom])
            ->andFilterWhere(['like', 'prenom', $this->prenom])
            ->andFilterWhere(['like', 'sex', $this->sex])
            ->andFilterWhere(['like', 'admin', $this->admin])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'adresse', $this->adresse])
            ->andFilterWhere(['like', 'domicile', $this->domicile])
            ->andFilterWhere(['like', 'photo', $this->photo]);

        return $dataProvider;
    }
}
