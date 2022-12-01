<?php

use yii\db\Migration;

/**
 * Class m221201_081324_backend_users
 */
class m221201_081324_backend_users extends Migration
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
}
