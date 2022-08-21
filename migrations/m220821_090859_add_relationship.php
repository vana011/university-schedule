<?php

use yii\db\Migration;

/**
 * Class m220821_090859_add_relationship
 */
class m220821_090859_add_relationship extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-role-to-user',
            'user',
            'role_id',
            'role',
            'id'
        );

        $this->addForeignKey(
            'fk-user-to-student',
            'student',
            'user_id',
            'user',
            'id'
        );

        $this->addForeignKey(
            'fk-user-to-teacher',
            'teacher',
            'user_id',
            'user',
            'id'
        );

        $this->addForeignKey(
            'fk-groupe-to-student',
            'student',
            'groupe_id',
            'groupe',
            'id'
        );

        $this->addForeignKey(
            'fk-groupe-to-schedule',
            'schedule',
            'groupe_id',
            'groupe',
            'id'
        );

        $this->addForeignKey(
            'fk-speciality-to-student',
            'student',
            'speciality_id',
            'speciality',
            'id'
        );

        $this->addForeignKey(
            'fk-speciality-to-speciality_subject',
            'speciality_subject',
            'speciality_id',
            'speciality',
            'id'
        );

        $this->addForeignKey(
            'fk-subject-to-speciality_subject',
            'speciality_subject',
            'subject_id',
            'subject',
            'id'
        );

        $this->addForeignKey(
            'fk-teacher-to-speciality_subject',
            'speciality_subject',
            'teacher_id',
            'teacher',
            'id'
        );

        $this->addForeignKey(
            'fk-speciality_subject-to-schedule',
            'schedule',
            'speciality_subject_id',
            'speciality_subject',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-role-to-user', 'user');
        $this->dropForeignKey('fk-user-to-student', 'student');
        $this->dropForeignKey('fk-user-to-teacher', 'teacher');
        $this->dropForeignKey('fk-groupe-to-student', 'student');
        $this->dropForeignKey('fk-groupe-to-schedule', 'schedule');
        $this->dropForeignKey('fk-speciality-to-student', 'student');
        $this->dropForeignKey('fk-speciality-to-speciality_subject', 'speciality_subject');
        $this->dropForeignKey('fk-subject-to-speciality_subject', 'speciality_subject');
        $this->dropForeignKey('fk-teacher-to-speciality_subject', 'speciality_subject');
        $this->dropForeignKey('fk-speciality_subject-to-schedule', 'schedule');
    }
}
