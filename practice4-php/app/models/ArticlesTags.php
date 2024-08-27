<?php

namespace app\models;

class ArticlesTags
{
  private int $articleId;
  private int $tagId;

  public function __construct($articleId, $tagId)
  {
    $this->articleId = $articleId;
    $this->tagId = $tagId;
  }

  /**
   * Get the value of tagId
   */
  public function getTagId()
  {
    return $this->tagId;
  }

  /**
   * Set the value of tagId
   *
   * @return  self
   */
  public function setTagId($tagId)
  {
    $this->tagId = $tagId;

    return $this;
  }

  /**
   * Get the value of articleId
   */
  public function getArticleId()
  {
    return $this->articleId;
  }

  /**
   * Set the value of articleId
   *
   * @return  self
   */
  public function setArticleId($articleId)
  {
    $this->articleId = $articleId;

    return $this;
  }
}
