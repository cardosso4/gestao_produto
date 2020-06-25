<?php

use yii\db\Migration;

/**
 * Class m200624_231031_criar_tabela_users
 */
class m200624_231031_criar_tabela_users extends Migration
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
        echo "m200624_231031_criar_tabela_users cannot be reverted.\n";

        return false;
    }

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->unique()->notNull(),
            'nivel' => $this->integer()->notNull(),
            'aceite_termos' => $this->boolean(),
            'password' => $this->string()->notNull(),
            'create_at' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
        ]);
    }

    public function down()
    {
        echo "m200624_231031_criar_tabela_users cannot be reverted.\n";

        return false;
    }
    
}
