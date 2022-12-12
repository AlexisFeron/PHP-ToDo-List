<?php

require_once("dal/gateway/GatewayListe.php");
require_once("metier/Compte.php");

class GatewayCompte
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }


    public function CreerCompte(string $pseudo, string $mdp) : bool
    {
        $query = "INSERT INTO Utilisateur(pseudonyme, motDePasse) VALUSES(:p, :m)";
        return $this->conn->executeQuerry($query, array(
            ":p" => array($pseudo->getPseudonyme(), PDO::PARAM_STR),
            ":m" => array($mdp->getMotDePasse(), PDO::PARAM_STR)));
    }

    public function modifier(Compte $compteModif)
    {
        $query = "UPDATE Utilisateur SET pseudonyme=:p, motDePasse=:m";
        return $this->conn->executeQuerry($query, array(
            ":p" => array($compteModif->getPseudonyme(), PDO::PARAM_STR),
            ":m" => array($compteModif->getMotDePasse(), PDO::PARAM_STR)));

    }

    public function supprimer(Compte $compteSuppr)
    {
        $query = "DELETE FROM Utilisateur WHERE pseudonyme =:i";
        return $this->conn->executeQuerry($query, array(
            ":i" => array($compteSuppr->getPseudonyme(), PDO::PARAM_INT)));
    }


    public function getCompte(string $pseudo) : ?Compte
    {
        $gw = new GatewayListe($this->conn);
        $query = "SELECT * FROM Utilisateur WHERE pseudonyme =:p";
        if(!$this->conn->executeQuery($query, [":p" => [$pseudo, PDO::PARAM_STR]]))
        {
            return array();
        }
        $comptesSQL = $this->conn->getResults();
        if(sizeof($comptesSQL) != 0)
        {
            $compte = new Compte(
                $comptesSQL[0]["pseudonyme"],
                $gw->getListeParCreateur(1, 10, $comptesSQL[0]["pseudonyme"]),
                $comptesSQL[0]["motDePasse"],
            );
            return $compte;
        }
        return null;
    }
}