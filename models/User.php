<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

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
class User extends \yii\db\ActiveRecord implements IdentityInterface
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
            [['password'], 'string', 'min' => 7],
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
            'email' => 'Почта',
            'password' => 'Пароль',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'phone' => 'Телефон',
            'role_id' => 'Роль',
        ];
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return $this->role->name == 'admin';
    }

    public function isTeacher()
    {
        return $this->role == 'teacher';
    }

    public function isStudent()
    {
        return $this->role == 'student';
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
     * Finds user by username
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail(string $email)
    {
        return self::find()->where(['email' => $email])->one() ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $users = self::find()->all();
        foreach ($users as $user) {
            if ($user->accessToken === $token) {
                return $user;
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return self::findOne($id) ?? null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
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
