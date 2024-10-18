<?php
namespace App\Controllers;
use App\Helpers\Auth;
use App\Models\Product;

class ProductController
{
    public function __construct()
    {
        if (Auth::check()) {
            layout('Main');
        } else {
            header("Location: /login");
        }
    }
    public function product()
    {
        $products = Product::getAll();
        return view("product", "Books", $products);
    }

    public function addProduct()
    {
        return view("addProduct", "Add Product");
    }

    public function createProduct()
    {
        if (isset($_POST['ok'])) {
            if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
                $targetDir = __DIR__ . '/../public/img/'; 
                $fileName = basename($_FILES['photo']['name']);
                $targetFilePath = $targetDir . $fileName;
    
                if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFilePath)) {
                    $imgPath = 'public/img/' . $fileName;  
                } else {
                    echo "Faylni yuklashda xatolik yuz berdi!";
                    exit;
                }
            } else {
                $imgPath = null;
            }
    
            $data = [
                'name'        => $_POST['name'],
                'author'      => $_POST['author'],
                'genre'       => $_POST['genre'],
                'title'       => $_POST['title'],
                'img'         => $imgPath
            ];
    
            if(Product::create($data)){
                header("Location: /");
                exit();
            }
        }
    }
    

    public function deleteProduct()
    {
        if(isset($_POST['ok']) && !empty($_POST['id'])){

            $id = $_POST['id'];

            $delete = Product::delete($id);

            if($delete){
                header("Location: /");
                exit();
            }else{
                echo "O'chirishda hatolik";
            }

        }
    }

    public function updateProduct()
    {
    
        if(isset($_POST['ok']) && !empty($_POST['id'])){

            $id = $_POST['id'];

            $product = Product::showOne($id);
            if($product){
                return view("/updateProduct", "Update", $product);
                exit();
            }else{
                echo "Bunday product yoq";
            }

        }
    }

    public static function update()
    {
        if (isset($_POST['ok'])) {
            if (!empty($_POST['name']) && !empty($_POST['author']) && !empty($_POST['genre']) && !empty($_POST['title']) && !empty($_POST['id']) && isset($_POST['old_photo'])) {

                $id = $_POST['id'];

                if (!empty($_FILES['photo']['name'])) {
                    $photo = $_FILES['photo'];
                    $data = explode('.', $photo['name']);
                    $filepath = date('Y-m-d_H-i-s_') . '.' . end($data);

                    if (move_uploaded_file($photo['tmp_name'], 'App/Views/Main/Uploads/' . $filepath)) {
                        $data = [
                            'id' => htmlspecialchars(strip_tags($id)),
                            'name' => htmlspecialchars(strip_tags($_POST['name'])),
                            'author' => htmlspecialchars(strip_tags($_POST['author'])),
                            'genre' => htmlspecialchars(strip_tags($_POST['genre'])),
                            'title' => htmlspecialchars(strip_tags($_POST['title'])),
                            'photo' => $filepath
                        ];
                    } else {
                        echo "Rasmni yuklashda xato.";
                        exit;
                    }
                } else {
                    $data = [
                        'id' => htmlspecialchars(strip_tags($id)),
                        'name' => htmlspecialchars(strip_tags($_POST['name'])),
                        'author' => htmlspecialchars(strip_tags($_POST['author'])),
                        'genre' => htmlspecialchars(strip_tags($_POST['genre'])),
                        'title' => htmlspecialchars(strip_tags($_POST['title'])),
                        'photo' => htmlspecialchars(strip_tags($_POST['old_photo']))
                    ];
                }

                if (Product::update($id, $data)) {
                    header("Location: /");
                    exit;
                } else {
                    echo "Yangilanishda xato.";
                }
            } else {
                echo "Barcha maydonlarni to'ldiring.";
            }
        }
    }
 
}

?>