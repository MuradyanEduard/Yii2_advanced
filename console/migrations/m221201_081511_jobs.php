<?php

use yii\db\Migration;

/**
 * Class m221201_081511_jobs
 */
class m221201_081511_jobs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('jobs', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'company_id' => $this->integer(),
            'location' => $this->string(),
            'categories_id' => $this->integer(),
            'tags' => $this->string(),
            'description' => $this->text(),
            'email' => $this->string(),
            'closing_date' => $this->date(),
            'user_id' => $this->integer(),
            'updated_at' => $this->timestamp(),
        ]);

        $this->addColumn(
            '{{%jobs}}',
            'created_at',
            $this->timestamp()->null()->defaultExpression('CURRENT_TIMESTAMP')
        );

        // creates index for column `user_id`
        $this->createIndex(
            'idx-jobs-user_id',
            '{{%jobs}}',
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-jobs-user_id',
            '{{%jobs}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `categories_id`
        $this->createIndex(
            'idx-jobs-categories_id',
            '{{%jobs}}',
            'categories_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-jobs-categories_id',
            '{{%jobs}}',
            'categories_id',
            '{{%categories}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('jobs');
    }

}
