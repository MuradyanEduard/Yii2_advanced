<?php

use yii\db\Migration;

/**
 * Class m221201_081247_add_varification_token_column
 */
class m221201_081247_add_varification_token_column extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'verification_token', $this->string()->defaultValue(null));
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'verification_token');
    }
}
