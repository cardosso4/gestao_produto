<?php

use yii\db\Migration;

/**
 * Class m200626_014243_drop_table_workflowaprovacao
 */
class m200626_014243_drop_table_workflowaprovacao extends Migration
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
        echo "m200626_014243_drop_table_workflowaprovacao cannot be reverted.\n";

        return false;
    }

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->dropTable('workflowaprovacao');
    }

    public function down()
    {
        echo "m200626_014243_drop_table_workflowaprovacao cannot be reverted.\n";

        return false;
    }
    
}
