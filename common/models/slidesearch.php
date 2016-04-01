<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\slide;

/**
 * slidesearch represents the model behind the search form about `common\models\slide`.
 */
class slidesearch extends slide
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['tieu_de', 'duong_dan', 'active', 'noi_dung'], 'safe'],
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
        $query = slide::find();

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

        $query->andFilterWhere(['like', 'tieu_de', $this->tieu_de])
            ->andFilterWhere(['like', 'duong_dan', $this->duong_dan])
            ->andFilterWhere(['like', 'active', $this->active])
            ->andFilterWhere(['like', 'noi_dung', $this->noi_dung]);

        return $dataProvider;
    }
}
