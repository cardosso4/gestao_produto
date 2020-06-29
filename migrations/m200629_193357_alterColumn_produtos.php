<?php

use yii\db\Migration;

/**
 * Class m200629_193357_alterColumn_produtos
 */
class m200629_193357_alterColumn_produtos extends Migration
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
        echo "m200629_193357_alterColumn_produtos cannot be reverted.\n";

        return false;
    }

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->alterColumn('produtos', 'imagem', $this->string()->null());
    }

    public function down()
    {
        echo "m200629_193357_alterColumn_produtos cannot be reverted.\n";

        return false;
    }
    
}
