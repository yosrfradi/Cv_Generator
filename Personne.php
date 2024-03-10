<?php
class Personne{
   
   private $nom ;
   private $adresse;
   private $email ;
   private $vsite ; 
   private $telephone;
   private $experience;
   private $formation;
   private $competance;
   private $skills;   
   private $photo;
   public function __construct(array $donnees){
       $this->hydrate($donnees);
   }
   public function hydrate(array $donnees){
       foreach ($donnees as $key =>$value){
           $method = 'set' . ucfirst ($key)  ;
       if (method_exists($this , $method)){
           $this->$method($value);
       } }
   }
   public function getNom(){
       return $this->nom;
   }
   public function getAdresse(){
       return $this->adresse;
   }
   public function getEmail(){
       return $this->email;
   }
   public function getSite(){
       return $this->vsite;
   }
   public function getTelephone(){
       return $this->telephone;
   }
   public function getExperience(){
       return $this->experience;
   }
   public function getFormation(){
       return $this->formation;
   }
   public function getCompetance(){
       return $this->competance;
   }
   public function getSkills(){
       return $this->skills;
   }
   public function getPhoto(){
       return $this->photo;
   }
   public function setNom($value){
        $this->nom=$value;
   }
   public function setAdresse($value){
        $this->adresse=$value;
   }
   public function setEmail($value){
        $this->email=$value;
   }
   public function setVsite($value){
        $this->vsite=$value;
   }
   public function setTelephone($value){
        $this->telephone=$value;
   }
   public function setExperience($value){
        $this->experience=$value;
   }
   public function setFormation($value){
        $this->formation=$value;
   }
   public function setCompetance($value){
        $this->competance=$value;
   }
   public function setSkills($value){
        $this->skills=$value;
   }
   public function setPhoto($value){
        $this->photo=$value;
   }
}
   
class DBconnect {
    private $conn ;
    public function __construct(PDO $conn){
        $this->conn = $conn;
    }
    public function ajout(Personne $donnees){
   $sql = 'INSERT INTO  personne(nom, email, adresse, vsite, telephone, experience, competance, skills, photo, formation) VALUES (:nom, :email, :adresse, :vsite, :telephone, :experience, :competance, :skills, :photo, :formation)';
   $stmt =$this->conn->prepare($sql);
   
   $stmt->bindValue(':nom',$donnees->getNom() );
   $stmt->bindValue(':email',$donnees->getEmail());
   $stmt->bindValue(':adresse',$donnees->getAdresse());
   $stmt->bindValue(':vsite',$donnees->getSite());
   $stmt->bindValue(':telephone',$donnees->getTelephone());
   $stmt->bindValue(':experience',$donnees->getExperience());
   $stmt->bindValue(':competance',$donnees->getCompetance());
   $stmt->bindValue(':skills',$donnees->getSkills());
   $stmt->bindValue(':photo',$donnees->getPhoto());
   $stmt->bindValue(':formation',$donnees->getFormation());
   $stmt->execute();
}
}