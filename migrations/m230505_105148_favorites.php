<?php

use yii\db\Migration;

class m230505_105148_favorites extends Migration
{
    public function safeUp()
    {
        $this->createTable('favorites', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'fruit_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
    }
    public function safeDown()
    {
        echo "m230505_105148_favorites cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230505_105148_favorites cannot be reverted.\n";

        return false;
    }
    */
}
