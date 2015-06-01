<?php

use function DI\object;
use SuperBlog\Model\ArticleRepository;
use SuperBlog\Persistence\InMemoryArticleRepository;

return [
    // Bind an interface to an implementation
    ArticleRepository::class => object(InMemoryArticleRepository::class),

    // Configure Twig
    Twig_Environment::class => function () {
        $loader = new Twig_Loader_Filesystem(__DIR__ . '/../src/SuperBlog/Views');
        return new Twig_Environment($loader);
    },
];
