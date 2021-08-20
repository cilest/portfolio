<?php

namespace App\Controller\BackOffice;

use App\Entity\Formation;
use App\Form\FormationType;
use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FormationController
 * @package App\Controller\BackOffice
 *
 * @Route("/admin/formations", name="backoffice_formations")
 */
class FormationController extends AbstractController
{
    /**
     * @Route("/", name="_manage")
     * @param FormationRepository $formationRepository
     * @return Response
     */
    public function manage(FormationRepository $formationRepository): Response
    {
        $formations = $formationRepository->findAll();

        return $this->render('backoffice/formation/manage.html.twig', [
            'formations' => $formations
        ]);
    }

    /**
     * @Route("/create", name="_create", methods={"GET", "POST"})
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $formation = new Formation();
        $form = $this->createForm(FormationType::class, $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $formation = $form->getData();
            $this->getDoctrine()->getManager()->persist($formation);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('backoffice_formations_manage');
        }

        return $this->render('backoffice/formation/create.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/update/{id}", name="_update", methods={"GET", "POST", "PUT", "PATCH"})
     * @param Request $request
     * @param Formation $formation
     * @return Response
     */
    public function update(Request $request, Formation $formation): Response
    {
        $form = $this->createForm(FormationType::class, $formation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('backoffice_formations_update', [
                'id' => $formation->getId()
            ]);
        }

        return $this->render('backoffice/formation/update.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id}", name="_delete", methods={"GET"})
     * @param Formation $formation
     * @return Response
     */
    public function delete(Formation $formation): Response
    {
        return $this->render('backoffice/formation/_form_delete.html.twig', [
            'formation' => $formation
        ]);
    }

    /**
     * @Route("/delete/{id}", name="_confirmed_delete", methods={"POST","DELETE"})
     * @param Request $request
     * @param Formation $formation
     * @return Response
     */
    public function confirmedDelete(Request $request, Formation $formation): Response
    {
        $submittedToken = $request->request->get('token');
        $id = 'delete.'.$formation->getId();

        if ($this->isCsrfTokenValid($id, $submittedToken)) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($formation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('backoffice_formations_manage');
    }
}
