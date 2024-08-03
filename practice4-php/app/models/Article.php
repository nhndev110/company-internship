<?php

namespace app\models;

class Article
{
  private int $id;
  private string $title;
  private string $content;
  private string $thumbnail;
  private string $slug;
  private string $topic;
  private int $author_id;

  public function __construct(
    int $id,
    string $title,
    string $content,
    string $thumbnail,
    string $slug,
    string $topic,
    int $author_id
  ) {
    $this->id = $id;
    $this->title = $title;
    $this->content = $content;
    $this->thumbnail = $thumbnail;
    $this->slug = $slug;
    $this->topic = $topic;
    $this->author_id = $author_id;
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
   * Get the value of topic
   */
  public function getTopic()
  {
    return $this->topic;
  }

  /**
   * Set the value of topic
   *
   * @return  self
   */
  public function setTopic($topic)
  {
    $this->topic = $topic;

    return $this;
  }

  /**
   * Get the value of author_id
   */
  public function getAuthor_id()
  {
    return $this->author_id;
  }

  /**
   * Set the value of author_id
   *
   * @return  self
   */
  public function setAuthor_id($author_id)
  {
    $this->author_id = $author_id;

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
}
