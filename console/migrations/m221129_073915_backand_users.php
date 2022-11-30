<?php

use yii\db\Migration;

/**
 * Class m221129_073915_backand_users
 */
class m221129_073915_backand_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%backend_users}}', [
            'id' => $this->primaryKey(),
            'login' => $this->string(),
            'password' => $this->string(),
            'authkey' => $this->string(),
            'accessToken' => $this->string(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%backend_users}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221129_073915_backand_users cannot be reverted.\n";

        return false;
    }
    */
}
