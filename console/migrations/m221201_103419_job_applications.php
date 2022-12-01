<?php

use yii\db\Migration;

/**
 * Class m221201_103419_job_applications
 */
class m221201_103419_job_applications extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('job_applications', [
            'id' => $this->primaryKey(),
            'job_id' => $this->integer(),
            'user_id' => $this->integer(),
            'status' => $this->integer(),
            'date' => $this->timestamp(),
        ]);

        // creates index for column `job_id`
        $this->createIndex(
            'idx-job_applications-job_id',
            '{{%job_applications}}',
            'job_id'
        );

        // add foreign key for table `job`
        $this->addForeignKey(
            'fk-job_applications-job_id',
            '{{%job_applications}}',
            'job_id',
            '{{%jobs}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            'idx-job_applications-user_id',
            '{{%job_applications}}',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-job_applications-user_id',
            '{{%job_applications}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('job_applications');
    }

}
