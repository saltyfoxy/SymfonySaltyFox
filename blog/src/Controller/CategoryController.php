<?php
namespace App\Controller;
use App\Entity\Category;
use App\Form\CategoryType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraint as Assert;


class CategoryController extends AbstractController
{
    /**
     * @param Request $request
     * @Route("/category", name="category_add")
     * @return Response
     */
    public function add(Request $request) : Response
    {
        $form = $this->createForm(CategoryType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $category = $form->getData();
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($category);
            $manager->flush();
            $this->addFlash('success', 'CategoryFixtures added !');
        }

        return $this->render('CategoryFixtures/addCategory.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}