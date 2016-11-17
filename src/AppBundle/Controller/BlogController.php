<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        /*// replace this example code with whatever you need
        $blog = new Post();
        $blog->setTitle('firstOne');
        $blog->setText('some text for article');

        $em = $this->getDoctrine()->getManager();
        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($blog);
        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new product with id '.$product->getId());*/

        $posts = $this->getDoctrine()
            ->getRepository('AppBundle:Post')
            ->findAll();

        $posts_arr = [];
        foreach ($posts as $post) {
            $posts_arr[] = [
                'id' => $post->getId(),
                'title' => $post->getTitle(),
                'text' => $post->getText(),
            ];
        }
        return $this->render('blog/index.html.twig', ["posts" => $posts_arr]);
    }
}
