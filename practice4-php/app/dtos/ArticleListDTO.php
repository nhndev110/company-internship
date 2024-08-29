<?php

namespace app\dtos;

use app\models\Article;
use app\models\Category;
use app\models\User;

class ArticleListDTO
{
  private int $id;
  private string $title;
  private string $description;
  private string $slug;
  private string $thumbnail;
  private int $status;
  private string $categoryName;
  private string $authorName;

  public function __construct(
    Article $article,
    Category $category,
    User $author
  ) {
    $this->id = $article->getId();
    $this->title  = $article->getTitle();
    $this->description = $article->getDescription();
    $this->slug = $article->getSlug();
    $this->thumbnail = $article->getThumbnail();
    $this->status = $article->getStatus();
    $this->categoryName = $category->getName();
    $this->authorName = $author->getName();
  }

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of title
   */
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * Set the value of title
   *
   * @return  self
   */
  public function setTitle($title)
  {
    $this->title = $title;

    return $this;
  }

  /**
   * Get the value of description
   */
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * Set the value of description
   *
   * @return  self
   */
  public function setDescription($description)
  {
    $this->description = $description;

    return $this;
  }

  /**
   * Get the value of slug
   */
  public function getSlug()
  {
    return $this->slug;
  }

  /**
   * Set the value of slug
   *
   * @return  self
   */
  public function setSlug($slug)
  {
    $this->slug = $slug;

    return $this;
  }

  /**
   * Get the value of thumbnail
   */
  public function getThumbnail()
  {
    return $this->thumbnail;
  }

  /**
   * Set the value of thumbnail
   *
   * @return  self
   */
  public function setThumbnail($thumbnail)
  {
    $this->thumbnail = $thumbnail;

    return $this;
  }

  /**
   * Get the value of status
   */
  public function getStatus()
  {
    return $this->status;
  }

  /**
   * Set the value of status
   *
   * @return  self
   */
  public function setStatus($status)
  {
    $this->status = $status;

    return $this;
  }

  /**
   * Get the value of categoryName
   */
  public function getCategoryName()
  {
    return $this->categoryName;
  }

  /**
   * Set the value of categoryName
   *
   * @return  self
   */
  public function setCategoryName($categoryName)
  {
    $this->categoryName = $categoryName;

    return $this;
  }

  /**
   * Get the value of authorName
   */
  public function getAuthorName()
  {
    return $this->authorName;
  }

  /**
   * Set the value of authorName
   *
   * @return  self
   */
  public function setAuthorName($authorName)
  {
    $this->authorName = $authorName;

    return $this;
  }
}
