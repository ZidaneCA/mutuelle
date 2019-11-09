<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Rembourse;

/**
 * RembourseSearch represents the model behind the search form of `app\models\Rembourse`.
 */
class RembourseSearch extends Rembourse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idEmp'], 'integer'],
            [['montant'], 'number'],
            [['date', 'matPercept'], 'safe'],
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
        $query = Rembourse::find();

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
            'idEmp' => $this->idEmp,
            'montant' => $this->montant,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'matPercept', $this->matPercept]);

        return $dataProvider;
    }
}
