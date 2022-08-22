<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property int $id
 * @property string|null $day
 * @property int|null $number
 * @property int|null $groupe_id
 * @property int|null $speciality_subject_id
 *
 * @property Groupe $groupe
 * @property SpecialitySubject $specialitySubject
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'groupe_id', 'speciality_subject_id'], 'integer'],
            [['day'], 'string', 'max' => 40],
            [['groupe_id'], 'exist', 'skipOnError' => true, 'targetClass' => Groupe::className(), 'targetAttribute' => ['groupe_id' => 'id']],
            [['speciality_subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => SpecialitySubject::className(), 'targetAttribute' => ['speciality_subject_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'day' => 'День',
            'number' => 'Номер',
            'groupe_id' => 'Группа',
            'speciality_subject_id' => 'Дисциплина',
        ];
    }

    /**
     * Gets query for [[Groupe]].
     *
     * @return \yii\db\ActiveQuery|GroupeQuery
     */
    public function getGroupe()
    {
        return $this->hasOne(Groupe::className(), ['id' => 'groupe_id']);
    }

    /**
     * Gets query for [[SpecialitySubject]].
     *
     * @return \yii\db\ActiveQuery|SpecialitySubjectQuery
     */
    public function getSpecialitySubject()
    {
        return $this->hasOne(SpecialitySubject::className(), ['id' => 'speciality_subject_id']);
    }

    /**
     * {@inheritdoc}
     * @return ScheduleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ScheduleQuery(get_called_class());
    }
}
