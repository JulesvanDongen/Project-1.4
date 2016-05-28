<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\HardSoftwareKoppeling;

/**
 * HardSoftwareKoppelingSearch represents the model behind the search form about `app\models\HardSoftwareKoppeling`.
 */
class HardSoftwareKoppelingSearch extends HardSoftwareKoppeling
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Hardware_ID', 'Software_ID'], 'integer'],
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
        $query = HardSoftwareKoppeling::find();

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
            'Hardware_ID' => $this->Hardware_ID,
            'Software_ID' => $this->Software_ID,
        ]);

        return $dataProvider;
    }
}
