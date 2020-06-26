<?php

use yii\db\Migration;

/**
 * Class m200625_225451_criar_tabela_aprovador
 */
class m200625_225451_criar_tabela_aprovador extends Migration
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
        echo "m200625_225451_criar_tabela_aprovador cannot be reverted.\n";

        return false;
    }

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

        $this->createTable('aprovador', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'situaqcao'  => $this->integer()->notNull(),
            'create_at'  => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
        ]);


        $this->addForeignKey(
            'fk_aprovador_aprovador',
            'aprovador',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );

    }

    public function down()
    {
        echo "m200625_225451_criar_tabela_aprovador cannot be reverted.\n";

        return false;
    }
    
}
