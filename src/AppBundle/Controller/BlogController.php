<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/blog")
 */
class BlogController extends Controller
{
  /**
   * @Route("/", name="blog_index")
   * @return Response
   */
  public function indexAction()
  {
    return $this->redirectToRoute('homepage');
  }

  /**
   * @Route("/{id}-{slug}", name="blog_post", requirements={"id": "\d+"})
   * @param Post $post
   * @return Response
   */
  public function postAction(Post $post)
  {
    return $this->render(':blog:post.html.twig', array(
      'post' => $post,
    ));
  }

  /**
   * @Route("/{id}", name="blog_post_redirect", requirements={"id": "\d+"})
   * @param Post $post
   * @return RedirectResponse
   */
  public function postRedirectAction(Post $post)
  {
    return $this->redirectToRoute('blog_post', array(
      'id' => $post->getId(),
      'slug' => $post->getSlug(),
    ));
  }
}
