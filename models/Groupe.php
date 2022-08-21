<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "groupe".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property Schedule[] $schedules
 * @property Student[] $students
 */
class Groupe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'groupe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery|ScheduleQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::className(), ['groupe_id' => 'id']);
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery|StudentQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['groupe_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return GroupeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new GroupeQuery(get_called_class());
    }
}
