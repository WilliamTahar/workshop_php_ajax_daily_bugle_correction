<?php

namespace App\Controller;

use App\Model\ArticleManager;

class AjaxController extends AbstractController
{
    private ArticleManager $articleManager;

    public function __construct()
    {
        parent::__construct();
        $this->articleManager = new ArticleManager();
        header('Content-Type: application/json');
    }

    public function getArticles(): string
    {
        return json_encode($this->articleManager->selectAll());
    }

    public function getRandomArticle(): string
    {
        return json_encode($this->articleManager->selectRandomOne());
    }

    public function searchArticles(string $search): string
    {
        $titles = $this->articleManager->searchArticles($search);
        return json_encode($titles);
    }

    public function getArticleById(int $id): string
    {
        //TODO
        return "$id";
    }
}
