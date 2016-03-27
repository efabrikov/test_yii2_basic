<?php

namespace app\modules\frontend\modules\block_1458162252\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\frontend\modules\block_1458162252\models\Base;

/**
 * BaseSearch represents the model behind the search form about `app\modules\frontend\modules\block_1458162252\models\Base`.
 */
class BaseSearch extends Base
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'message', 'outlet_1'], 'safe'],
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
        $query = Base::find();

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

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'outlet_1', $this->outlet_1]);

        return $dataProvider;
    }
}
