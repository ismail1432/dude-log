<?php


namespace App\Controller;


use App\Entity\Contact;
use App\Form\ContactType;
use App\Services\DudeLog;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ContactController extends AbstractController
{
    /**
     * @Route("/", name="add")
     */
    public function add(Request $request)
    {
        $contact = new Contact();

        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $contact = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();
            return $this->redirectToRoute('list');
        }

        return $this->render('base.html.twig', [
            'form_contact' => $form->createView()
        ]);
    }

    /**
     * @Route("/list", name="list")
     */
    public function list()
    {
        return $this->render('list.html.twig', [
            'contacts' => $this->getDoctrine()->getRepository(Contact::class)->findAll(),
            ]);
    }

    /**
     * @Route("/log", name="log")
     */
    public function log(DudeLog $dudeLog)
    {
        $dudeLog->logItWithMagicalGetLogger();
        return new Response("<h1>Logged !</h1>");
    }

}
