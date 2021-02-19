<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lists;

/**
 * ListsSearch represents the model behind the search form about `app\models\Lists`.
 */
class ListsSearch extends Lists
{
    public $q;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'dep_code', 'created_by', 'updated_by'], 'integer'],
            [['fullname', 'position', 'email', 'tel', 'fax', 'tel_moi', 'mobile_fix', 'mobile_phone', 'image', 'created_at', 'updated_at','q'], 'safe'],
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
        $query = Lists::find();

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
            'dep_code' => $this->dep_code,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->orFilterWhere(['like', 'fullname', $this->q])
            ->orFilterWhere(['like', 'position', $this->q]);
            // ->andFilterWhere(['like', 'email', $this->email])
            // ->andFilterWhere(['like', 'tel', $this->tel])
            // ->andFilterWhere(['like', 'fax', $this->fax])
            // ->andFilterWhere(['like', 'tel_moi', $this->tel_moi])
            // ->andFilterWhere(['like', 'mobile_fix', $this->mobile_fix])
            // ->andFilterWhere(['like', 'mobile_phone', $this->mobile_phone])
            // ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
