<?php
namespace src\Controller;

use src\Model\Categorie;
use src\Model\BDD;

class CategorieController extends AbstractController {

    public function Add(){
        if($_POST){
            $objCategorie = new Categorie();
            $objCategorie->setIcone($_POST["Icone"]);
            $objCategorie->setNom($_POST["Nom"]);
            //Exécuter l'insertion
            $id = $objCategorie->SqlAdd(BDD::getInstance());
            // Redirection
            header("Location:/Categorie/show/$id");
        }else{
            return $this->twig->render("Categorie/add.html.twig");
        }


    }

    public function All(){
        $categories = new Categorie();
        $datas = $categories->SqlGetAll(BDD::getInstance());

        return $this->twig->render("Categorie/all.html.twig", [
            "categorieList"=>$datas
        ]);
    }

    public function Show($id){
        $categories = new Categorie();
        $datas = $categories->SqlGetById(BDD::getInstance(),$id);

        return $this->twig->render("Categorie/show.html.twig", [
            "categorie"=>$datas
        ]);
    }

    public function Delete($id){
        $articles = new Categorie();
        $datas = $articles->SqlDeleteById(BDD::getInstance(),$id);

        header("Location:/Article/Show");
    }

    public function Update($id){
        $categories = new Categorie();
        $datas = $categories->SqlGetById(BDD::getInstance(),$id);

        if($_POST){
            $objCategorie = new Categorie();
            $objCategorie->setIcone($_POST["Icone"]);
            $objCategorie->setNom($_POST["Nom"]);
            //Exécuter la mise à jour
            $objCategorie->SqlUpdate(BDD::getInstance());
            // Redirection
            header("Location:/categorie/show/$id");
        }else{
            return $this->twig->render("Categorie/update.html.twig", [
                "categorie"=>$datas
            ]);
        }

    }

}