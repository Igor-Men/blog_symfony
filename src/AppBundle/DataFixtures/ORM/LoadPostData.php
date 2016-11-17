<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Post;
class LoadPostData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {


        foreach ([1,2,3,4,5] as $key => $num){
            $post = new Post();
            $post->setTitle('Title '.$num);
            $post->setText('new beatifull text to new article'.$num);
            $post->setDateCreated(new \DateTime());
            $post->setDateUpdated(new \DateTime());
            $manager->persist($post);
        }
        $manager->flush();
    }
}