<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string|null $name
 * @property float|null $ball
 * @property int|null $user_id
 * @property int|null $speciality_id
 * @property int|null $groupe_id
 *
 * @property Groupe $groupe
 * @property Speciality $speciality
 * @property User $user
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ball'], 'number'],
            [['user_id', 'speciality_id', 'groupe_id'], 'integer'],
            [['name'], 'string', 'max' => 150],
            [['groupe_id'], 'exist', 'skipOnError' => true, 'targetClass' => Groupe::className(), 'targetAttribute' => ['groupe_id' => 'id']],
            [['speciality_id'], 'exist', 'skipOnError' => true, 'targetClass' => Speciality::className(), 'targetAttribute' => ['speciality_id' => 'id']],
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
            'name' => 'ФИО',
            'ball' => 'Балл',
            'user_id' => 'Аккаунт',
            'speciality_id' => 'Специальность',
            'groupe_id' => 'Группа',
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
     * Gets query for [[Speciality]].
     *
     * @return \yii\db\ActiveQuery|SpecialityQuery
     */
    public function getSpeciality()
    {
        return $this->hasOne(Speciality::className(), ['id' => 'speciality_id']);
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
     * @return StudentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StudentQuery(get_called_class());
    }
}
