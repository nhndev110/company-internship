<?php

namespace app\dtos\admin;

class EditArticleDTO
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
  private array $tagsId;

  public function __construct(
    int $id,
    string $title,
    string $description,
    string $content,
    string $slug,
    string $thumbnail,
    int $status,
    int $categoryId,
    int $authorId,
    array $tagsId
  ) {
    $this->id = $id;
    $this->title = $title;
    $this->description = $description;
    $this->content = $content;
    $this->slug = $slug;
    $this->thumbnail = $thumbnail;
    $this->status = $status;
    $this->categoryId = $categoryId;
    $this->authorId = $authorId;
    $this->tagsId = $tagsId;
  }


  // Getter and Setter for $title
  public function getTitle(): string
  {
    return $this->title;
  }

  public function setTitle(string $title): void
  {
    $this->title = $title;
  }

  // Getter and Setter for $description
  public function getDescription(): string
  {
    return $this->description;
  }

  public function setDescription(string $description): void
  {
    $this->description = $description;
  }

  // Getter and Setter for $content
  public function getContent(): string
  {
    return $this->content;
  }

  public function setContent(string $content): void
  {
    $this->content = $content;
  }

  // Getter and Setter for $slug
  public function getSlug(): string
  {
    return $this->slug;
  }

  public function setSlug(string $slug): void
  {
    $this->slug = $slug;
  }

  // Getter and Setter for $thumbnail
  public function getThumbnail(): string
  {
    return $this->thumbnail;
  }

  public function setThumbnail(string $thumbnail): void
  {
    $this->thumbnail = $thumbnail;
  }

  // Getter and Setter for $status
  public function getStatus(): int
  {
    return $this->status;
  }

  public function setStatus(int $status): void
  {
    $this->status = $status;
  }

  // Getter and Setter for $categoryId
  public function getCategoryId(): int
  {
    return $this->categoryId;
  }

  public function setCategoryId(int $categoryId): void
  {
    $this->categoryId = $categoryId;
  }

  // Getter and Setter for $authorId
  public function getAuthorId(): int
  {
    return $this->authorId;
  }

  public function setAuthorId(int $authorId): void
  {
    $this->authorId = $authorId;
  }

  // Getter and Setter for $tagId
  public function getTagsId(): array
  {
    return $this->tagsId;
  }

  public function setTagsId(int $tagsId): void
  {
    $this->tagsId = $tagsId;
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
}
