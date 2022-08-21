<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "speciality".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $codeword
 *
 * @property SpecialitySubject[] $specialitySubjects
 * @property Student[] $students
 */
class Speciality extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'speciality';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 150],
            [['codeword'], 'string', 'max' => 2],
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
            'codeword' => 'Codeword',
        ];
    }

    /**
     * Gets query for [[SpecialitySubjects]].
     *
     * @return \yii\db\ActiveQuery|SpecialitySubjectQuery
     */
    public function getSpecialitySubjects()
    {
        return $this->hasMany(SpecialitySubject::className(), ['speciality_id' => 'id']);
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery|StudentQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['speciality_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return SpecialityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SpecialityQuery(get_called_class());
    }
}
