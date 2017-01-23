<?php

namespace BG\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BG\CoreBundle\Entity\Chat;

require __DIR__ . '/../../../../vendor/autoload.php';

class CoreController extends Controller
{
    public function indexAction(Request $request)
    {
        $request = $this->getUser();

        if ($this->getUser(!null)) {
            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('BGCoreBundle:User');
            $user = $repository->find($request);

            return $this->render('BGCoreBundle:Default:index.html.twig', array(
                'login' => $request,
                'session' => $user
            ));
        } else {

            return $this->render('BGCoreBundle:Default:index.html.twig', array(
                'login' => $request,
            ));
        }
    }

    public function loginAction()
    {
        return $this->render('BGCoreBundle:Default:login.html.twig');
    }

    public function chatAction(Request $request)
    {
        return $this->render('BGCoreBundle:Default:chat.html.twig');
    }
}
