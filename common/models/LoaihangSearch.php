<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\loaihang;

/**
 * LoaihangSearch represents the model behind the search form about `common\models\loaihang`.
 */
class LoaihangSearch extends loaihang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nhomloaihang'], 'integer'],
            [['tenloai', 'duongdan'], 'safe'],
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
        $query = loaihang::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'nhomloaihang' => $this->nhomloaihang,
        ]);

        $query->andFilterWhere(['like', 'tenloai', $this->tenloai])
            ->andFilterWhere(['like', 'duongdan', $this->duongdan]);

        return $dataProvider;
    }
}
