<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
 */
class Post
{
  use TimestampableEntity;

  /**
   * @var int
   *
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $id;

  /**
   * @var string
   *
   * @ORM\Column(name="title", type="string", length=255)
   */
  private $title;

  /**
   * @var string
   *
   * @ORM\Column(name="subtitle", type="string", length=255)
   */
  private $subtitle;

  /**
   * @var string
   *
   * @ORM\Column(name="slug", type="string", length=255)
   * @Gedmo\Slug(fields={"title"}, unique=false)
   */
  private $slug;

  /**
   * @var string
   *
   * @ORM\Column(name="content", type="text")
   */
  private $content;

  /**
   * @var string
   *
   * @ORM\Column(name="image_path", type="string", length=255, nullable=true)
   */
  private $imagePath;

  /**
   * @return integer
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param string $title
   * @return $this
   */
  public function setTitle($title)
  {
    $this->title = $title;

    return $this;
  }

  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }

  /**
   * @param string $subtitle
   * @return $this
   */
  public function setSubtitle($subtitle)
  {
    $this->subtitle = $subtitle;

    return $this;
  }

  /**
   * @return string
   */
  public function getSubtitle()
  {
    return $this->subtitle;
  }

  /**
   * @param string $slug
   * @return $this
   */
  public function setSlug($slug)
  {
    $this->slug = $slug;

    return $this;
  }

  /**
   * @return string
   */
  public function getSlug()
  {
    return $this->slug;
  }

  /**
   * @param string $content
   * @return $this
   */
  public function setContent($content)
  {
    $this->content = $content;

    return $this;
  }

  /**
   * @return string
   */
  public function getContent()
  {
    return $this->content;
  }

  /**
   * @param string $imagePath
   * @return $this
   */
  public function setImagePath($imagePath)
  {
    $this->imagePath = $imagePath;

    return $this;
  }

  /**
   * @return string
   */
  public function getImagePath()
  {
    return $this->imagePath;
  }
}
