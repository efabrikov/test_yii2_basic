<?php

use yii\db\Migration;

class m160316_213325_create_block_1458162252 extends Migration
{
    public function up()
    {
        $this->createTable('block_1458162252', [
            'id' => $this->primaryKey(),
            'name' => $this->string(12),
            'message' => $this->string(12),
            'outlet_1' => $this->string(12)
        ]);
    }

    public function down()
    {
        $this->dropTable('block_1458162252');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
