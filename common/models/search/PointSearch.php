<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Point;

/**
 * PointSearch represents the model behind the search form about `common\models\Point`.
 */
class PointSearch extends Point
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'animal_id', 'type', 'user_id', 'status'], 'integer'],
            [['coordinate', 'created_at'], 'safe'],
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
        $query = Point::find();
        $query->addSelect( "id,animal_id,type,user_id,`status`,created_at,X(coordinate) AS lng, Y(coordinate) AS lat");

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'animal_id' => $this->animal_id,
            'type' => $this->type,
            'user_id' => $this->user_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ]);

        return $dataProvider;
    }
}
