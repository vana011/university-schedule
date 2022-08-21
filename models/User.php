<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 * @property string|null $phone
 * @property int|null $role_id
 *
 * @property Role $role
 * @property Student[] $students
 * @property Teacher[] $teachers
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password', 'authKey', 'accessToken'], 'required'],
            [['authKey', 'accessToken'], 'string'],
            [['role_id'], 'integer'],
            [['email'], 'string', 'max' => 60],
            [['password'], 'string', 'max' => 20],
            [['phone'], 'string', 'max' => 30],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'phone' => 'Phone',
            'role_id' => 'Role ID',
        ];
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery|RoleQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery|StudentQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Teachers]].
     *
     * @return \yii\db\ActiveQuery|TeacherQuery
     */
    public function getTeachers()
    {
        return $this->hasMany(Teacher::className(), ['user_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
