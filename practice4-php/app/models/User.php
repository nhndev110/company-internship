<?php

namespace app\models;

class User
{
  private int $id;
  private string $name;
  private string $username;
  private string $password;
  private ?string $tokenRemember;

  public function __construct(
    int $id,
    string $name,
    string $username,
    string $password,
    ?string $tokenRemember
  ) {
    $this->id = $id;
    $this->name = $name;
    $this->username = $username;
    $this->password = $password;
    $this->tokenRemember = $tokenRemember;
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
   * Get the value of name
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set the value of name
   *
   * @return  self
   */
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of username
   */
  public function getUsername()
  {
    return $this->username;
  }

  /**
   * Set the value of username
   *
   * @return  self
   */
  public function setUsername($username)
  {
    $this->username = $username;

    return $this;
  }

  /**
   * Get the value of password
   */
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * Set the value of password
   *
   * @return  self
   */
  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }

  /**
   * Get the value of tokenRemember
   */
  public function getTokenRemember()
  {
    return $this->tokenRemember;
  }

  /**
   * Set the value of tokenRemember
   *
   * @return  self
   */
  public function setTokenRemember($tokenRemember)
  {
    $this->tokenRemember = $tokenRemember;

    return $this;
  }
}
