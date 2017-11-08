<?php

use yii\db\Migration;

class m171107_123617_user_akses extends Migration
{
    public $tableName = '{{%user_akses}}';

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'skpd_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ], $tableOptions);

        // creates index for column `author_id`
        $this->createIndex(
            'idx-user_id',
            $this->tableName,
            'user_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-user_akses_user_id',
            $this->tableName,
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-user_akses_user_id',
            $this->tableName
        );
        $this->dropTable($this->tableName);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171107_123617_user_akses cannot be reverted.\n";

        return false;
    }
    */
}
