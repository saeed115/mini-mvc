<?php

namespace app;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];
    public Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function get($url, $fn)
    {
        $this->getRoutes[$url] = $fn;
    }
    public function post($url, $fn)
    {
        $this->postRoutes[$url] = $fn;
    }

    public function resolve()
    {
        $current_url = $_SERVER['PATH_INFO'] ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        if ($method === 'GET'){
            $fn = $this->getRoutes[$current_url] ?? null;
        }else{
            $fn = $this->postRoutes[$current_url] ?? null;
        }

        if (!$fn){
            echo 'Page not found';
            exit();
        }

        call_user_func($fn, $this);
    }

    public function renderView($view, $params = []) //EX: products/index
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        ob_start();
        require_once __DIR__."/views/$view.php";
        $content = ob_get_clean();
        include_once __DIR__."/views/_layout.php";
    }

}