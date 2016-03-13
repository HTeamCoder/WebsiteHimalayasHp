<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\hanghoa;

/**
 * HanghoaSearch represents the model behind the search form about `common\models\hanghoa`.
 */
class HanghoaSearch extends hanghoa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['tenhang', 'duongdan', 'tinhtrang', 'tomtat', 'mota', 'mahang', 'thuonghieu_id', 'loaihang_id'], 'safe'],
            [['giaban', 'giacanhtranh'], 'number'],
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
        $query = hanghoa::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 2,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith(['thuonghieu','loaihang']);
        $query->andFilterWhere([
            'id' => $this->id,
            'giaban' => $this->giaban,
            'giacanhtranh' => $this->giacanhtranh,
        ]);

        $query->andFilterWhere(['like', 'tenhang', $this->tenhang])
            ->andFilterWhere(['like', 'duongdan', $this->duongdan])
            ->andFilterWhere(['like', 'tinhtrang', $this->tinhtrang])
            ->andFilterWhere(['like', 'tomtat', $this->tomtat])
            ->andFilterWhere(['like', 'mota', $this->mota])
            ->andFilterWhere(['like', 'mahang', $this->mahang])
            ->andFilterWhere(['like', 'yii2_thuonghieu.ten', $this->thuonghieu_id])
            ->andFilterWhere(['like', 'yii2_loaihang.tenloai', $this->loaihang_id]);
        return $dataProvider;
    }
}
