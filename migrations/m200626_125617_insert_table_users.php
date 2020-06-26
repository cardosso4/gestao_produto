<?php

use yii\db\Migration;

/**
 * Class m200626_125617_insert_table_users
 */
class m200626_125617_insert_table_users extends Migration
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
        echo "m200626_125617_insert_table_users cannot be reverted.\n";

        return false;
    }

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->insert('users',['name' => 'Admin',
                               'email'=>'admin@teste.com',
                               'nivel' => 1,
                               'primeiro_acesso' => 1,
                               'password' => '$2y$13$6cJTzeZjWeaI1TNGogTnpeRYlrH4Gm6Qtx14K6CetcX8Uj4k3UlmW']
                            );
    }

    public function down()
    {
        echo "m200626_125617_insert_table_users cannot be reverted.\n";

        return false;
    }
    
}
