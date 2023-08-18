<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comment}}`.
 */
class m230817_155243_create_comment_table extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->createTable('comment', [
      'id' => $this->primaryKey(),
      'text' => $this->text(),
      'id_cafe' => $this->integer()
    ]);
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    $this->dropTable('{{%comment}}');
  }
}
