<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hardware;

/**
 * HardwareSearch represents the model behind the search form about `app\models\Hardware`.
 */
class HardwareSearch extends Hardware
{
    public $Leveranciernaam;
    public $Fabrikantnaam;
    public $Adres;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Hardware_ID', 'Leverancier_ID', 'Fabrikant_ID', 'Locatie_ID'], 'integer'],
            [['Besturingssysteem', 'Omschrijving', 'Status', 'Jaar_van_aanschaf', 'Leveranciernaam', 'Fabrikantnaam', 'Adres'], 'safe'],
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
        $query = Hardware::find()->joinWith(['leverancier', 'fabrikant', 'locatie']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
               'leverancier.naam' => [
                   'asc' => ['leverancier.Naam' => SORT_ASC],
                   'desc' => ['leverancier.Naam' => SORT_DESC],
                   'label' => 'Leveranciernaam',
               ]
            ]
        ]);

        $this->load($params);

        if (!($this->load($params) && $this->validate())) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'Hardware_ID' => $this->Hardware_ID,
            'Leverancier_ID' => $this->Leverancier_ID,
            'Fabrikant_ID' => $this->Fabrikant_ID,
            'Locatie_ID' => $this->Locatie_ID,
        ]);

        $query->andFilterWhere(['like', 'Besturingssysteem', $this->Besturingssysteem])
            ->andFilterWhere(['like', 'Omschrijving', $this->Omschrijving])
            ->andFilterWhere(['like', 'Status', $this->Status])
            ->andFilterWhere(['like', 'Jaar_van_aanschaf', $this->Jaar_van_aanschaf])
            ->andFilterWhere(['like', 'leverancier.Naam', $this->Leveranciernaam])
            ->andFilterWhere(['like', 'fabrikant.Naam', $this->Fabrikantnaam])
            ->andFilterWhere(['like', 'locatie.Adres', $this->Adres]);

        return $dataProvider;
    }
}
