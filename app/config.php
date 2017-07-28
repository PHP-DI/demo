<?php

use function DI\object;
use SuperBlog\Model\ArticleRepository;
use SuperBlog\Persistence\InMemoryArticleRepository;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\ArgvInput;


return [
    // Bind an interface to an implementation
    ArticleRepository::class => object(InMemoryArticleRepository::class),

    // Bind console interfaces to an implementation
    OutputInterface::class => object(ConsoleOutput::class),
    InputInterface::class => object(ArgvInput::class),

    // Configure Twig
    Twig_Environment::class => function () {
        $loader = new Twig_Loader_Filesystem(__DIR__ . '/../src/SuperBlog/Views');
        return new Twig_Environment($loader);
    },

];
