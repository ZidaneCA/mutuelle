<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Emprunt;

/**
 * EmpruntSearch represents the model behind the search form of `app\models\Emprunt`.
 */
class EmpruntSearch extends Emprunt
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['matMembre', 'dateEmp', 'delais', 'matExp'], 'safe'],
            [['montant'], 'number'],
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
        $query = Emprunt::find();

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
            'montant' => $this->montant,
            'dateEmp' => $this->dateEmp,
            'delais' => $this->delais,
        ]);

        $query->andFilterWhere(['like', 'matMembre', $this->matMembre])
            ->andFilterWhere(['like', 'matExp', $this->matExp]);

        return $dataProvider;
    }
}
