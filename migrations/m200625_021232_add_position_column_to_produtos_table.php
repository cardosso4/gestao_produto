<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%produtos}}`.
 */
class m200625_021232_add_position_column_to_produtos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    }

    public function up()
    {
        $this->addColumn('produtos', 'imagem', $this->string()->notNull()->after('descricao'));
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    }


}
