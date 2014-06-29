<?php

namespace Sw\Bundle\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sw\Bundle\ApplicationBundle\Entity\Comment;
use Sw\Bundle\ApplicationBundle\Entity\SwimmingPool;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SwApplicationBundle:Default:index.html.twig');
    }

    public function newAction()
    {
        $swimmingPool = new SwimmingPool();
        $form = $this->createSwpForm($swimmingPool);
        return $this->render('SwApplicationBundle:Default:new.html.twig', array('swpForm' => $form->createView()));
    }

    public function listAction()
    {
        $comment = new Comment();
        $form = $this->createCommentForm($comment);
        return $this->render('SwApplicationBundle:Default:list.html.twig', array('commentForm' => $form->createView()));
    }

    private function createCommentForm($comment)
    {
        $form = $this->createFormBuilder($comment)
            ->setAction($this->generateUrl('sw_application_swimmingpools_add_comment'))
            ->add('swimmingPoolId', 'hidden')
            ->add('author', 'text')
            ->add('content', 'textarea')
            ->add('rank', 'hidden', array('data' => 3))
            ->getForm()
        ;

        return $form;
    }

    private function createSwpForm($swimmingPool)
    {
        $form = $this->createFormBuilder($swimmingPool)
            ->setAction($this->generateUrl('sw_application_swimmingpools_add'))
            ->add('name', 'text')
            ->add('address', 'text')
            ->add('zipCode', 'text')
            ->add('lat', 'text')
            ->add('lon', 'text')
            ->add('Valider', 'submit')
            ->getForm()
        ;

        return $form;
    }
}
