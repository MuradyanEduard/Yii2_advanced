<?php

use yii\db\Migration;

/**
 * Class m221130_082707_jobs
 */
class m221130_082707_jobs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('jobs', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'Company' => $this->string(),
            'location' => $this->string(),
            'categories_id' => $this->integer(),
            'tags' => $this->string(),
            'Description' => $this->string(),
            'email' => $this->string(),
            'closing_date' => $this->date(),
            'user_id' => $this->integer(),
        ]);

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

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221130_082707_jobs cannot be reverted.\n";

        return false;
    }
    */
}
