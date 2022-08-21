<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "teacher".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $address
 * @property int|null $experience
 * @property float|null $salary
 * @property int|null $user_id
 *
 * @property SpecialitySubject[] $specialitySubjects
 * @property User $user
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['experience', 'user_id'], 'integer'],
            [['salary'], 'number'],
            [['name'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 150],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'address' => 'Address',
            'experience' => 'Experience',
            'salary' => 'Salary',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[SpecialitySubjects]].
     *
     * @return \yii\db\ActiveQuery|SpecialitySubjectQuery
     */
    public function getSpecialitySubjects()
    {
        return $this->hasMany(SpecialitySubject::className(), ['teacher_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return TeacherQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TeacherQuery(get_called_class());
    }
}
