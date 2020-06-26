<?php

use yii\db\Migration;

/**
 * Class m200626_014742_create_table_workflowaprovacao
 */
class m200626_014742_create_table_workflowaprovacao extends Migration
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
        echo "m200626_014742_create_table_workflowaprovacao cannot be reverted.\n";

        return false;
    }

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('workflowaprovacao', [
            'id' => $this->primaryKey(),
            'produto_id' => $this->integer()->notNull(),
            'aprovador_id'  => $this->integer()->notNull(),
            'situaqcao'  => $this->integer()->notNull(),
            'observacao' => $this->text(),
            'create_at'  => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
        ]);


        $this->addForeignKey(
            'fk_workflowaprovacao_produto_id',
            'workflowaprovacao',
            'produto_id',
            'produtos',
            'id',
            'CASCADE'
        );
        
        $this->addForeignKey(
            'fk_workflowaprovacao_aprovador_id',
            'workflowaprovacao',
            'aprovador_id',
            'aprovador',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        echo "m200626_014742_create_table_workflowaprovacao cannot be reverted.\n";

        return false;
    }
    
}
