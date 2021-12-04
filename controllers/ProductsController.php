<?php

namespace app\controllers;
use app\models\Product;
use app\Router;

class ProductsController
{

    public function index(Router $router)
    {
        $s = $_GET['s'] ?? '';

        $products = $router->db->getProducts($s);

        $router->renderView('products/index', [
            'products' => $products,
            's' => $s
        ]);
    }

    public function create(Router $router)
    {
        $errors = [];
        $productData = [
            'id' => '',
            'title' => '',
            'price' => '',
            'img' => '',
            'p_desc' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $productData['title'] = $_POST['title'];
            $productData['price'] = (float)$_POST['price'];
            $productData['imgFile'] = $_FILES['img'] ?? null;
            $productData['p_desc'] = $_POST['desc'];

            $product = new Product();
            $product->load($productData);
            $errors = $product->save();

            if (empty($errors)){
                header('Location: /products');
                exit();
            }
        }

        $router->renderView('products/create', [
            'errors' => $errors,
            'product' => $productData
        ]);
    }

    public function update(Router $router)
    {
        $id = $_GET['id'] ?? null;
        if (!$id){
            header('Location: /products');
            exit();
        }

        $errors = [];
        $productData = $router->db->getProductById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            $productData['title'] = $_POST['title'];
            $productData['price'] = (float)$_POST['price'];
            $productData['imgFile'] = $_FILES['img'] ?? null;
            $productData['p_desc'] = $_POST['desc'];

            $product = new Product();
            $product->load($productData);
            $errors = $product->save();

            if (empty($errors)){
                header('Location: /products');
                exit();
            }
        }

        $router->renderView('products/update', [
            'product' => $productData,
            'errors' => $errors
        ]);
    }

    public function destroy(Router $router)
    {
        $id = $_POST['id'] ?? null;
        if (!$id){
            header('Location: /products');
            exit();
        }

        $router->db->deleteProduct($id);

        header('Location: /products');
    }



}