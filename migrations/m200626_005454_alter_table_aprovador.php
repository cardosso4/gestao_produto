<?php

use yii\db\Migration;

/**
 * Class m200626_005454_alter_table_aprovador
 */
class m200626_005454_alter_table_aprovador extends Migration
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
        echo "m200626_005454_alter_table_aprovador cannot be reverted.\n";

        return false;
    }

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->renameColumn('aprovador','situaqcao','situacao');

    }

    public function down()
    {
        echo "m200626_005454_alter_table_aprovador cannot be reverted.\n";

        return false;
    }
    
}
