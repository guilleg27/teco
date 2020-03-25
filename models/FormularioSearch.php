<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Formulario;

/**
 * FormularioSearch represents the model behind the search form of `app\models\Formulario`.
 */
class FormularioSearch extends Formulario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nombre_completo', 'email', 'celular', 'date', 'ktoken', 'plan', 'pais', 'ciudad', 'carrier', 'pubId', 'providerId'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        if (isset($params["startDate"]) && isset($params["endDate"]))
        {
            $startDate = $params["startDate"];
            $endDate   = $params["endDate"];
        }else{
            $startDate = date('Y-m-d',strtotime('yesterday'));
            $endDate   = date('Y-m-d',strtotime('NOW'));
        }

        $query = Formulario::find();
        $query->where(['between', 'date', $startDate, date('Y-m-d',strtotime('+1 day' , strtotime($endDate))) ]);
        $query->andWhere(['or',
           ['pais'=>'Argentina'],
           ['pais'=>null]
        ]);
        $query->andWhere(['<>','UPPER(ciudad)', 'TIERRA DEL FUEGO']);

        // if(Yii::$app->user->identity->username == 'personal'){
            $query->andWhere(['<>','carrier', 'Personal']);
        // }
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
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'nombre_completo', $this->nombre_completo])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'celular', $this->celular])
            ->andFilterWhere(['like', 'ktoken', $this->ktoken])
            ->andFilterWhere(['like', 'plan', $this->plan])
            ->andFilterWhere(['like', 'pais', $this->pais])
            ->andFilterWhere(['like', 'ciudad', $this->ciudad])
            ->andFilterWhere(['like', 'carrier', $this->carrier])
            ->andFilterWhere(['like', 'pubId', $this->pubId])
            ->andFilterWhere(['like', 'providerId', $this->providerId]);

        return $dataProvider;
    }
}
