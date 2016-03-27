<?php

use yii\db\Migration;

class m160316_143945_create_fm_1458135584 extends Migration
{
    public function up()
    {
        $this->createTable('fm_1458135584', [
            'id' => $this->primaryKey(),
            'name' => $this->string(12)->notNull()->defaultValue('default name')
        ]);
    }

    public function down()
    {
        $this->dropTable('fm_1458135584');
    }
}
