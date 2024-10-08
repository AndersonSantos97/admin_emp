<?php

namespace App\Controller;

use App\Entity\Empleado;
use App\Form\EmpleadoType;
use App\Repository\EmpleadoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EmpleadoController extends AbstractController
{
    #[Route('/', name: 'app_empleado_index', methods:['GET'])]
    public function index(EmpleadoRepository $empleadoRepository): Response
    {
        $empleados = $empleadoRepository->findAllWithRelations();
        #dd($empleados);
        return $this->render('empleado/index.html.twig', [
            'empleados' => $empleados,
        ]);
    }

    #[Route('/edit/{id}',name:'app_empleado_edit',methods:['GET','POST'])]
    public function edit(Request $request, Empleado $empleado, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EmpleadoType::class, $empleado);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $entityManager->flush();

            return $this->redirectToRoute('app_empleado_index',[],Response::HTTP_SEE_OTHER);
        }

        return $this->render('empleado/edit.html.twig',[
            'empleado' => $empleado,
            'form' => $form,
        ]);
    }

    #[Route('delete/{id}', name:'app_empleado_delete', methods:['POST'])]
    public function delete(Request $request, Empleado $empleado, EntityManagerInterface $entityManager): Response
    {
        if($this->isCsrfTokenValid('delete'.$empleado->getId(), $request->getPayload()->getString('_token'))){
            $entityManager->remove($empleado);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_empleado_index', [], Response::HTTP_SEE_OTHER);
    }

    // #[Route(path: '/new', name: 'app_empleado_new', methods: ['GET','POST'])]
    // public function new(Request $request, EntityManagerInterface $entityManager ): Response
    // {
    //     $empleado = new Empleado(); 
    //     $form = $this->createForm(EmpleadoType::class, $empleado);

    //     $form->handleRequest($request);

    //     if($form->isSubmitted() && $form->isValid()){
    //         $entityManager->persist($empleado);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('app_empleado_index', [], Response::HTTP_SEE_OTHER);
    //     }else{
    //         return $this->render('empleado/create.html.twig', [
    //             'empleado' => $empleado,
    //             'form' => $form,
    //         ]);     
    //     }

    // }
    #[Route(path: 'empleado/new', name: 'app_empleado_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $usuario = new Empleado();
        $form = $this->createForm(EmpleadoType::class, $usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($usuario);
            $entityManager->flush();

            return $this->redirectToRoute('app_empleado_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('empleado/new.html.twig', [
            'usuario' => $usuario,
            'form' => $form,
        ]);
    }
}
