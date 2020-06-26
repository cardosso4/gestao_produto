<?php

use yii\db\Migration;

/**
 * Class m200626_005744_alter_table_users
 */
class m200626_005744_alter_table_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200626_005744_alter_table_users cannot be reverted.\n";

        return false;
    }

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->renameColumn('users','aceite_termos','primeiro_acesso');
    }

    public function down()
    {
        echo "m200626_005744_alter_table_users cannot be reverted.\n";

        return false;
    }
    
}
