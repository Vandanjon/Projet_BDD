<?php

class Articles extends Controller
{
    public function index()
    {
        $this->loadModel("Article");
        $articles = $this->Article->getAll();
        $this->render("index", compact("articles"));
    }

    public function lire(string $slug)
    {
        $this->loadModel("Article");
        $article = $this->Article->findBySlug($slug);
        $this->render("lire", compact("article"));
    }

}