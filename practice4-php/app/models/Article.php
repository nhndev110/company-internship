<?php

namespace app\models;

class Article
{
  private int $id;
  private string $title;
  private string $description;
  private string $content;
  private string $slug;
  private string $thumbnail;
  private int $status;
  private int $categoryId;
  private int $authorId;

  public function __construct(
    int $id,
    string $title,
    string $description,
    string $content,
    string $slug,
    string $thumbnail,
    int $status,
    int $categoryId,
    int $authorId
  ) {
    $this->id = $id;
    $this->title = $title;
    $this->description = $description;
    $this->content = $content;
    $this->thumbnail = $thumbnail;
    $this->slug = $slug;
    $this->status = $status;
    $this->categoryId = $categoryId;
    $this->authorId = $authorId;
  }

  public function getId()
  {
    return $this->id;
  }

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
   * Get the value of content
   */
  public function getContent()
  {
    return $this->content;
  }

  /**
   * Set the value of content
   *
   * @return  self
   */
  public function setContent($content)
  {
    $this->content = $content;

    return $this;
  }

  /**
   * Get the value of authorId
   */
  public function getAuthorId()
  {
    return $this->authorId;
  }

  /**
   * Set the value of authorId
   *
   * @return  self
   */
  public function setAuthorId($authorId)
  {
    $this->authorId = $authorId;

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
   * Get the value of categoryId
   */
  public function getCategoryId()
  {
    return $this->categoryId;
  }

  /**
   * Set the value of categoryId
   *
   * @return  self
   */
  public function setCategoryId($categoryId)
  {
    $this->categoryId = $categoryId;

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
}
