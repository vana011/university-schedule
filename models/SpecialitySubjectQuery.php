<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[SpecialitySubject]].
 *
 * @see SpecialitySubject
 */
class SpecialitySubjectQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return SpecialitySubject[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return SpecialitySubject|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
