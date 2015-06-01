<?php

use SuperBlog\Model\ArticleRepository;
use Symfony\Component\Console\Output\OutputInterface;

$container = require __DIR__ . '/app/bootstrap.php';

$app = new Silly\Application();

// Silly will use PHP-DI for dependency injection based on type-hints
$app->useContainer($container, $injectWithTypeHint = true);

// Show the article list
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
$app->command('article [id]', function ($id, OutputInterface $output, ArticleRepository $repository) {
    $article = $repository->getArticle($id);

    $output->writeln('<info>' . $article->getTitle() . '</info>');
    $output->writeln($article->getContent());
});

$app->run();
