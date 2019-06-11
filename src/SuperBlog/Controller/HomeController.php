<?php

namespace SuperBlog\Controller;

use SuperBlog\Model\ArticleRepository;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig_Environment;

class HomeController
{
    /**
     * @var ArticleRepository
     */
    private $repository;

    /**
     * @var Twig_Environment
     */
    private $twig;

    public function __construct(ArticleRepository $repository, Twig_Environment $twig)
    {
        $this->repository = $repository;
        $this->twig = $twig;
    }

    /**
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function __invoke(): void
    {
        echo $this->twig->render('home.twig', [
            'articles' => $this->repository->getArticles(),
        ]);
    }
}
