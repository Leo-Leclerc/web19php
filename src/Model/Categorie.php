<?php
namespace src\Model;

class Categorie {
    private $Id;
    private $Icone;
    private $Nom;

    public function SqlAdd(\PDO $bdd){
        try {
            $requete = $bdd->prepare("INSERT INTO categories (Icone, Nom) VALUES(:Icone, :Nom)");

            $requete->execute([
                "Icone" => $this->getIcone(),
                "Nom" => $this->getNom(),
            ]);
            return $bdd->lastInsertId();
        }catch (\Exception $e){
            return $e->getMessage();
        }

    }

    public function SqlGetAll(\PDO $bdd){
        $requete = $bdd->prepare("SELECT * FROM categories");
        $requete->execute();
        //$datas =  $requete->fetchAll(\PDO::FETCH_ASSOC);
        $datas =  $requete->fetchAll(\PDO::FETCH_CLASS,'src\Model\Categorie');
        return $datas;

    }

    public function SqlUpdate(\PDO $bdd){
        try {
            $requete = $bdd->prepare("UPDATE categories set Icone= :Icone, Nom = :Nom WHERE Id = :Id");

            $requete->execute([
                "Icone" => $this->getIcone(),
                "Nom" => $this->getNom(),
            ]);
            return "OK";
        }catch (\Exception $e){
            return $e->getMessage();
        }

    }

    public function SqlGetById(\PDO $bdd, $Id){
        $requete = $bdd->prepare("SELECT * FROM categories WHERE Id=:Id");
        $requete->execute([
            "Id" => $Id
        ]);
        $requete->setFetchMode(\PDO::FETCH_CLASS,'src\Model\Categorie');
        $categorie = $requete->fetch();

        return $categorie;
    }

    public function SqlGetByIdArticle(\PDO $bdd, $Id){
        $requete = $bdd->prepare("SELECT Nom FROM categories WHERE Id=:Id");
        $requete->execute([
            "Id" => $Id
        ]);
        $requete->setFetchMode(\PDO::FETCH_CLASS,'src\Model\Categorie');
        $categorie = $requete->fetch();

        return $categorie;
    }

    public function SqlDeleteById(\PDO $bdd, $Id){
        $requete = $bdd->prepare("DELETE FROM categories WHERE Id=:Id");
        $requete->execute([
            "Id" => $Id
        ]);
        return true;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param mixed $Id
     * @return Article
     */
    public function setId($Id)
    {
        $this->Id = $Id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIcone()
    {
        return $this->Icone;
    }

    /**
     * @param mixed $Icone
     * @return Article
     */
    public function setIcone($Icone)
    {
        $this->Icone = $Icone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * @param mixed $Nom
     * @return Article
     */
    public function setNom($Nom)
    {
        $this->Nom = $Nom;
        return $this;
    }

}