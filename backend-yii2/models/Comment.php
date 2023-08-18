<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string|null $text
 * @property int|null $id_cafe
 */
class Comment extends \yii\db\ActiveRecord
{
  /**
   * {@inheritdoc}
   */
  public static function tableName()
  {
    return 'comment';
  }

  /**
   * {@inheritdoc}
   */
  public function rules()
  {
    return [
      [['text'], 'string'],
      [['id_cafe'], 'integer'],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function attributeLabels()
  {
    return [
      'id' => 'ID',
      'text' => 'Text',
      'id_cafe' => 'Id Cafe',
    ];
  }
}
