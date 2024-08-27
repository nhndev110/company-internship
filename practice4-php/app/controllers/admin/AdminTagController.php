<?php

namespace app\controllers\admin;

use app\core\BaseController;
use app\models\Tag;
use app\repositories\TagRespository;
use Exception;

class AdminTagController extends BaseController
{

  public function index(): void
  {
    $tags = TagRespository::getAll();
    $result = array_map(fn($tag) => ["id" => $tag->getId(), "name" => $tag->getName()], $tags);
    echo json_encode($result);
  }

  public function store(): void
  {
    $tagName = $_POST['name'];
    if (empty($tagName)) {
      throw new Exception("Missing required parameter(s)");
    }
    try {
      $newTag = TagRespository::insertOne(new Tag(0, $tagName));
      echo json_encode([
        "status" => "success",
        "data" => ["id" => $newTag->getId(), "name" => $newTag->getName()]
      ]);
    } catch (Exception $e) {
      echo json_encode(["status" => "error", "msg" => $e->getMessage()]);
    }
  }
}
