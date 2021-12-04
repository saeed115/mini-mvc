<?php

namespace app;
use app\models\Product;
use PDO;

class Database
{
    public \PDO $pdo;
    public static Database $db;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;port=3306;dbname=p_crud', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        self::$db = $this;
    }

    public function getProducts($s = '')
    {
        if ($s) {
            $stat = $this->pdo->prepare('SELECT * FROM products WHERE title LIKE :title');
            $stat->bindValue(':title', "%$s%");
        }else {
            $stat = $this->pdo->prepare('SELECT * FROM products ORDER BY c_at DESC');
        }

        $stat->execute();
        return $stat->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createProduct(Product $product)
    {
        $statement = $this->pdo->prepare("INSERT INTO products (title, img, p_desc, price, c_at)
                VALUES (:title, :img, :p_desc, :price, :c_at)");
        $statement->bindValue(':title', $product->title);
        $statement->bindValue(':img', $product->imgPath);
        $statement->bindValue(':p_desc', $product->p_desc);
        $statement->bindValue(':price', $product->price);
        $statement->bindValue(':c_at', date('Y-m-d H:i:s'));

        $statement->execute();
    }

    public function updateProduct(Product $product)
    {
        $statement = $this->pdo->prepare("UPDATE products SET title = :title, 
                                        img = :image, 
                                        p_desc = :description, 
                                        price = :price WHERE id = :id");
        $statement->bindValue(':title', $product->title);
        $statement->bindValue(':image', $product->imgPath);
        $statement->bindValue(':description', $product->p_desc);
        $statement->bindValue(':price', $product->price);
        $statement->bindValue(':id', $product->id);

        $statement->execute();
    }

    public function deleteProduct($id)
    {
        $statement = $this->pdo->prepare('DELETE FROM products WHERE id = :id');
        $statement->bindValue(':id', $id);

        return $statement->execute();
    }

    public function getProductById($id)
    {
        $statement = $this->pdo->prepare('SELECT * FROM products WHERE id = :id');
        $statement->bindValue(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }
}