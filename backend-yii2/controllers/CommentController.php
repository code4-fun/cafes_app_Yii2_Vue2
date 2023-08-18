<?php

namespace app\controllers;

use app\models\Comment;
use Yii;
use yii\web\Controller;

class CommentController extends Controller
{
  public $enableCsrfValidation = false;

  public function actionCommentsByCafeId()
  {
    $cafe_id = Yii::$app->request->get('id');

    $comments = Comment::find()
      ->where([
        'id_cafe' => $cafe_id
      ])
      ->orderBy('id DESC')
      ->asArray()
      ->all();

    return $this->asJson($comments);
  }

  public function actionCreate()
  {
    $request = Yii::$app->request;
    $comment = new Comment();
    $comment->attributes = [
      'text' => $request->post('text'),
      'id_cafe' => $request->post('id_cafe')
    ];
    $comment->save();

    return $this->asJson(
      $comment
    );
  }

  public function actionOption()
  {
    $this->response->setStatusCode(200);
  }

  public function behaviors()
  {
    $behaviors = parent::behaviors();

    $behaviors['corsFilter'] = [
      'class' => \yii\filters\Cors::class,
      'cors' => [
        'Origin' => ['*'],
        'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
        'Access-Control-Request-Headers' => ['*'],
        'Access-Control-Allow-Methods' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
        'Allow' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
        'Access-Control-Allow-Credentials' => null,
        'Access-Control-Max-Age' => 86400,
        'Access-Control-Expose-Headers' => []
      ]
    ];
    return $behaviors;
  }
}
