<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Incidenten;

/**
 * IncidentenSearch represents the model behind the search form about `app\models\Incidenten`.
 */
class IncidentenSearch extends Incidenten
{
    public $searchUnassigned = false;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Incident_ID', 'Hardware_ID', 'Software_ID', 'Niet_oplosbaar', 'Afgehandeld', 'Prioriteit', 'In_behandeling_door', 'Ingevuld_door'], 'integer'],
            [['Probleembeschrijving', 'Datum', 'Tijd', 'Ingevuld_tijdens_vragenscript'], 'safe'],
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
        $query = Incidenten::find();

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
            'Incident_ID' => $this->Incident_ID,
            'Hardware_ID' => $this->Hardware_ID,
            'Software_ID' => $this->Software_ID,
            'Datum' => $this->Datum,
            'Tijd' => $this->Tijd,
            'Niet_oplosbaar' => $this->Niet_oplosbaar,
            'Afgehandeld' => $this->Afgehandeld,
            'Prioriteit' => $this->Prioriteit,
//            'In_behandeling_door' => $this->In_behandeling_door,
            'Ingevuld_door' => $this->Ingevuld_door,
        ]);

        if ($this->searchUnassigned === true) {
            $query->andWhere(['In_behandeling_door' => null]);
        } else {
            $query->andFilterWhere(['In_behandeling_door' => $this->In_behandeling_door]);
        }

        $query->andFilterWhere(['like', 'Probleembeschrijving', $this->Probleembeschrijving])
            ->andFilterWhere(['like', 'Ingevuld_tijdens_vragenscript', $this->Ingevuld_tijdens_vragenscript]);

        return $dataProvider;
    }
}
