<?php

namespace SuperBlog\Persistence;

use SuperBlog\Model\Article;
use SuperBlog\Model\ArticleRepository;

class InMemoryArticleRepository implements ArticleRepository
{
    private $articles;

    public function __construct()
    {
        $this->articles = [
            1 => new Article(1, 'Hello world!', 'This article is here to welcome you.'),
            2 => new Article(2, 'There is something new!', 'Here is a another article.'),
        ];
    }

    /**
     * @return Article[]
     */
    public function getArticles(): array
    {
        return $this->articles;
    }

    /**
     * @param int $id
     *
     * @return Article
     */
    public function getArticle(int $id): Article
    {
        return $this->articles[$id];
    }
}
