<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Schedule;

/**
 * ScheduleSearch represents the model behind the search form of `app\models\Schedule`.
 */
class ScheduleSearch extends Schedule
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'number', 'groupe_id', 'speciality_subject_id'], 'integer'],
            [['day'], 'safe'],
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
        $query = Schedule::find();

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
            'number' => $this->number,
            'groupe_id' => $this->groupe_id,
            'speciality_subject_id' => $this->speciality_subject_id,
        ]);

        $query->andFilterWhere(['like', 'day', $this->day]);

        if (!\Yii::$app->user->isGuest) {
            $user = \app\models\User::find()->where(['id' => \Yii::$app->user->id])->one();

            if ($user->isTeacher()) {
                $ids = SpecialitySubject::find()->where(['teacher_id' => $user->teachers[0]->id])->select(['id'])->asArray();
                $query->where(['in', 'speciality_subject_id', $ids]);
            }
        }

        if (!\Yii::$app->user->isGuest) {
            $user = \app\models\User::find()->where(['id' => \Yii::$app->user->id])->one();

            if ($user->isStudent()) {
                if (count($user->students) != 0) {
                    $query->where(['groupe_id' => $user->students[0]->groupe_id]);
                } else {
                    $query->where(['groupe_id' => -1]);
                }
            }
        }

        return $dataProvider;
    }
}
