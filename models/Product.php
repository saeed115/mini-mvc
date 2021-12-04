<?php


namespace app\models;


use app\Database;
use app\helpers\UtilHelper;

class Product
{
    public ?int $id = null;
    public string $title;
    public string $p_desc;
    public float $price;
    public ?string $imgPath = null;
    public array $imgFile;

    public function load($data)
    {
        $this->id = $data['id'] ?? null;
        $this->title = $data['title'];
        $this->p_desc = $data['p_desc'] ?? '';
        $this->imgFile = $data['imgFile'];
        $this->imgPath = $data['img'] ?? '';
        $this->price = $data['price'];
    }

    public function save()
    {
        $errors = [];

        if (!$this->title){
            $errors[] = 'Product title is required';
        }
        if (!$this->price){
            $errors[] = 'Product price is required';
        }

        if (!is_dir(__DIR__.'/../public/images')){
            mkdir(__DIR__.'/../public/images');
        }

        if (empty($errors)) {
            if ($this->imgFile && $this->imgFile['tmp_name']) {

                if ($this->imgPath) {
                    unlink(__DIR__ . '/../public/' . $this->imgPath);
                }

                $this->imgPath = 'images/' . UtilHelper::randomString(8) . '/' . $this->imgFile['name'];
                mkdir(dirname(__DIR__ . '/../public/' . $this->imgPath));
                move_uploaded_file($this->imgFile['tmp_name'], __DIR__ . '/../public/' . $this->imgPath);
            }

            $db = Database::$db;

            if ($this->id) {
                $db->updateProduct($this);
            } else {
                $db->createProduct($this);
            }

        }

        return $errors;
    }
}