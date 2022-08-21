<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "speciality_subject".
 *
 * @property int $id
 * @property int|null $count_hour
 * @property int|null $speciality_id
 * @property int|null $subject_id
 * @property int|null $teacher_id
 *
 * @property Schedule[] $schedules
 * @property Speciality $speciality
 * @property Subject $subject
 * @property Teacher $teacher
 */
class SpecialitySubject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'speciality_subject';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['count_hour', 'speciality_id', 'subject_id', 'teacher_id'], 'integer'],
            [['speciality_id'], 'exist', 'skipOnError' => true, 'targetClass' => Speciality::className(), 'targetAttribute' => ['speciality_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['subject_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::className(), 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'count_hour' => 'Count Hour',
            'speciality_id' => 'Speciality ID',
            'subject_id' => 'Subject ID',
            'teacher_id' => 'Teacher ID',
        ];
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery|ScheduleQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::className(), ['speciality_subject_id' => 'id']);
    }

    /**
     * Gets query for [[Speciality]].
     *
     * @return \yii\db\ActiveQuery|SpecialityQuery
     */
    public function getSpeciality()
    {
        return $this->hasOne(Speciality::className(), ['id' => 'speciality_id']);
    }

    /**
     * Gets query for [[Subject]].
     *
     * @return \yii\db\ActiveQuery|SubjectQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id' => 'subject_id']);
    }

    /**
     * Gets query for [[Teacher]].
     *
     * @return \yii\db\ActiveQuery|TeacherQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::className(), ['id' => 'teacher_id']);
    }

    /**
     * {@inheritdoc}
     * @return SpecialitySubjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SpecialitySubjectQuery(get_called_class());
    }
}
