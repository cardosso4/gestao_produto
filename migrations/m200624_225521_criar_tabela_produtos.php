<?php

use yii\db\Migration;

/**
 * Class m200624_225521_criar_tabela_produtos
 */
class m200624_225521_criar_tabela_produtos extends Migration
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
        echo "m200624_225521_criar_tabela_produtos cannot be reverted.\n";

        return false;
    }

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

        $this->createTable('produtos', [
            'id' => $this->primaryKey(),
            'codigo' => $this->string(60)->notNull(),
            'descricao' => $this->string(120)->notNull(),
            'valor' => $this->decimal(11,5),
            'situacao' => $this->integer()->notNull(), //Ativo, Inativo, Obsoleto
            'narrativa' => $this->text(),
            'create_at' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
        ]);

    }

    public function down()
    {
        echo "m200624_225521_criar_tabela_produtos cannot be reverted.\n";

        return false;
    }
    
}
