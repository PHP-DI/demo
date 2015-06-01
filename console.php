<?php

use SuperBlog\Model\ArticleRepository;
use Symfony\Component\Console\Output\OutputInterface;

$container = require __DIR__ . '/app/bootstrap.php';

$app = new Silly\Application();

// Silly will use PHP-DI for dependency injection based on type-hints
$app->useContainer($container, $injectWithTypeHint = true);

// Show the article list
// This command is implemented using a closure. We can still benefit from dependency
// injection in the parameters of the closure because Silly + PHP-DI is awesome.
$app->command('articles', function (OutputInterface $output, ArticleRepository $repository) {
    $output->writeln('<comment>Here are the articles in the blog:</comment>');

    $articles = $repository->getArticles();

    foreach ($articles as $article) {
        $output->writeln(sprintf(
            'Article #%d: <info>%s</info>',
            $article->getId(),
            $article->getTitle()
        ));
    }
});

// Show an article
// For this command we provide an invokable class instead of a closure
// That allows to use dependency injection in the constructor
$app->command('article [id]', 'SuperBlog\Command\ArticleDetailCommand');

$app->run();
