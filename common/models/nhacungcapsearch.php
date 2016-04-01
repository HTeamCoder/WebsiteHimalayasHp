<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\nhacungcap;

/**
 * nhacungcapsearch represents the model behind the search form about `common\models\nhacungcap`.
 */
class nhacungcapsearch extends nhacungcap
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['ten', 'dia_chi', 'email', 'so_dien_thoai'], 'safe'],
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
        $query = nhacungcap::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'ten', $this->ten])
            ->andFilterWhere(['like', 'dia_chi', $this->dia_chi])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'so_dien_thoai', $this->so_dien_thoai]);

        return $dataProvider;
    }
}
