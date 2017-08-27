<?php

use yii\db\Migration;

class m170621_175849_video_category extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%sbl_node_to_category_video}}', [
            'id' => 'int not null auto_increment PRIMARY KEY',
            'node_id' => 'int not null',
            'category_id' => 'int not null',
        ]);
        //$this->addPrimaryKey('{{%sbl_node_to_category_video_pkey}}', '{{%sbl_node_to_category_video}}', 'id');
        $this->addForeignKey('{{%sbl_node_to_category_video_sbl_node_id_fk}}', '{{%sbl_node_to_category_video}}',
            'node_id', '{{%sbl_node}}', 'id', 'cascade', 'cascade');
        $this->addForeignKey('{{%sbl_node_to_category_video_sbl_category_id_fk}}', '{{%sbl_node_to_category_video}}',
            'category_id', '{{%sbl_category_video}}', 'id', 'cascade', 'cascade');
        $this->createIndex('{{%sbl_node_to_category_video_node_id_idx}}', '{{%sbl_node_to_category_video}}',
            'node_id');
        $this->createIndex('{{%sbl_node_to_category_video_category_id_idx}}', '{{%sbl_node_to_category_video}}',
            'category_id');

        $this->execute("INSERT INTO {{%sbl_node_to_category_video}}(node_id,category_id) SELECT id,rating FROM {{%sbl_node}} WHERE type_id = ".\app\models\node\Type::VIDEO);
    }

    public function safeDown()
    {
       $this->dropTable('{{%sbl_node_to_category_video}}');
    }


}
