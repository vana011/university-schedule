<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property SpecialitySubject[] $specialitySubjects
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subject';
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
     * Gets query for [[SpecialitySubjects]].
     *
     * @return \yii\db\ActiveQuery|SpecialitySubjectQuery
     */
    public function getSpecialitySubjects()
    {
        return $this->hasMany(SpecialitySubject::className(), ['subject_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return SubjectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SubjectQuery(get_called_class());
    }
}
