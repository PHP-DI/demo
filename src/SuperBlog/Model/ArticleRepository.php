<?php

namespace SuperBlog\Model;

/**
 * This is an interface so that the model is coupled to a specific backend.
 *
 * This is also so that we can demonstrate how to bind an interface
 * to an implementation with PHP-DI.
 */
interface ArticleRepository
{
    /**
     * @return Article[]
     */
    public function getArticles(): array;

    /**
     * @param int $id
     *
     * @return Article
     */
    public function getArticle(int $id): Article;
}
