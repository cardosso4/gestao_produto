<?php

use yii\db\Migration;

/**
 * Class m200625_224241_criar_tabela_workflowaprovacao
 */
class m200625_224241_criar_tabela_workflowaprovacao extends Migration
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
        echo "m200625_224241_criar_tabela_workflowaprovacao cannot be reverted.\n";

        return false;
    }

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

        $this->createTable('workflowaprovacao', [
            'id' => $this->primaryKey(),
            'produto_id' => $this->integer()->notNull(),
            'aprovador' => $this->integer()->notNull(),
            'situaqcao'  => $this->integer()->notNull(),
            'observacao' => $this->text(),
            'create_at' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
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
            'fk_workflowaprovacao_aprovador',
            'workflowaprovacao',
            'aprovador',
            'users',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        echo "m200625_224241_criar_tabela_workflowaprovacao cannot be reverted.\n";

        return false;
    }
    
}
