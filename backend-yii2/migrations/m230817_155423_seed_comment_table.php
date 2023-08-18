<?php

use yii\db\Migration;

/**
 * Class m230817_155423_seed_comment_table
 */
class m230817_155423_seed_comment_table extends Migration
{
  /**
   * {@inheritdoc}
   */
  public function safeUp()
  {
    $this->insertFakeComments();
  }

  /**
   * {@inheritdoc}
   */
  public function safeDown()
  {
    echo "m230817_155423_seed_comment_table cannot be reverted.\n";

    return false;
  }

  private function insertFakeComments()
  {
    $faker = \Faker\Factory::create();

    for ($i = 0; $i < 30; $i++) {
      $this->insert(
        'comment',
        [
          'text' => $faker->text(),
          'id_cafe' => $faker->randomNumber(1, 20)
        ]
      );
    }
  }
}
