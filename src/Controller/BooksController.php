<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;
use Symfony\Component\HttpFoundation\Response;

class BooksController extends AbstractController
{
    /**
     * @Route("/books", name="books")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Book::class);
        $books = $repository->findAll();

        return $this->render('books/index.html.twig', [
            'controller_name' => 'BooksController',
            'books' => $books
        ]);
    }

    /**
     * @Route("/book/{id}", name="book")
     */
    public function book($id){
        $book = $this->getDoctrine()->getRepository(Book::class)->find($id);

        if (!$book) {
            throw $this->createNotFoundException(
                'No book found for id '.$id
            );
        }

        return $this->render('books/details.html.twig', [
               'book' => $book
        ]);

    }





}
