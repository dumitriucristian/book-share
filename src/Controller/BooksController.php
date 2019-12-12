<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;

class BooksController extends AbstractController
{
    /**
     * @Route("/books", name="books")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Book::class);
        $books = $repository->findAll();
       // dump($books); die();

        return $this->render('books/index.html.twig', [
            'controller_name' => 'BooksController',
            'books' => $books
        ]);
    }


}
