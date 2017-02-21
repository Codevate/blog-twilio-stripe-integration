<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Post;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPostData implements FixtureInterface
{
  /**
   * @param ObjectManager $manager
   */
  public function load(ObjectManager $manager)
  {
    $post = new Post();
    $post->setTitle('New NASA research shows that space is really, really, really big');
    $post->setSubtitle('Just look up and see for yourself');
    $content = <<<EOF
<p>We want to explore. We’re curious people. Look back over history, people have put their lives at stake to go out and explore … We believe in what we’re doing. Now it’s time to go.</p>

<h2 class="section-heading">To go places and do things</h2>

<p>Never in all their history have men been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe, a round earth in which all the directions eventually meet, in which there is no center because every point, or none, is center — an equal earth which all men occupy as equals. The airman's earth, if free men make it, will be truly round: a globe in practice, not in theory.</p>

<p>For those who have seen the Earth from space, and for the hundreds and perhaps thousands more who will, the experience most certainly changes your perspective. The things that we share in our world are far more valuable than those which divide us.</p>

<p>To go places and do things that have never been done before – that’s what living is all about.</p>

<p>Placeholder text by <a href="http://spaceipsum.com/">Space Ipsum</a>. Photographs by <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>.</p>
EOF;
    $post->setContent($content);
    $post->setImagePath('img/post-bg.jpg');
    $manager->persist($post);
    $manager->flush();

    $post = new Post();
    $post->setTitle('Scientists achieve break-through on sending cattle to space');
    $post->setSubtitle('Critics question the decision over llamas');
    $content = <<<EOF
<p>Science cuts two ways, of course; its products can be used for both good and evil. But there's no turning back from science. The early warnings about technological dangers also come from science.</p>

<h2 class="section-heading">Across the sea of space</h2>

<p>Science has not yet mastered prophecy. We predict too much for the next year and yet far too little for the next 10.</p>

<p>The regret on our side is, they used to say years ago, we are reading about you in science class. Now they say, we are reading about you in history class.</p>

<p>We want to explore. We’re curious people. Look back over history, people have put their lives at stake to go out and explore &hellip; We believe in what we’re doing. Now it’s time to go.</p>

<p>Placeholder text by <a href="http://spaceipsum.com/">Space Ipsum</a>. Photographs by <a href="https://www.flickr.com/photos/nasacommons/">NASA on The Commons</a>.</p>
EOF;
    $post->setContent($content);
    $post->setImagePath('img/contact-bg.jpg');
    $manager->persist($post);
    $manager->flush();
  }
}
