<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\nhacungcap;

/**
 * NhacungcapSearch represents the model behind the search form about `common\models\nhacungcap`.
 */
class NhacungcapSearch extends nhacungcap
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['tennhacungcap', 'diachi', 'sodienthoai', 'email'], 'safe'],
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

        $query->andFilterWhere(['like', 'tennhacungcap', $this->tennhacungcap])
            ->andFilterWhere(['like', 'diachi', $this->diachi])
            ->andFilterWhere(['like', 'sodienthoai', $this->sodienthoai])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
