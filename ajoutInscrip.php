<?php
require("connect.php");

$dsn = "mysql:host=" . SERVER . ";dbname=" . BASE;
try {
    $conn = new PDO($dsn, USER, PASSWD);
    echo "Connexion réussie ! ";
} catch (PDOException $e) {
    echo "Echec de la connexion : " . $e->getMessage();
    exit();
}
// Vérifier si les données du formulaire d'inscription ont été soumises
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['inscription'])) {
    try {
        $conn = new PDO($dsn, USER, PASSWD);
        // Définir l'attribut PDO pour signaler les erreurs
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Créer un objet User avec les données du formulaire
        $user = new User($_POST['nomIns'], $_POST['preIns'], $_POST['mailIns'], $_POST['pwd']);
        
        // Préparer la requête SQL avec des paramètres nommés
        $sql = 'INSERT INTO utilisateurs (nom, prenom, email, mdp) VALUES (:nom, :prenom, :email, :mdp)';
        $stmt = $conn->prepare($sql);
        
        // Lier les valeurs des paramètres
        $stmt->bindValue(':nom', $user->getNomIns());
        $stmt->bindValue(':prenom', $user->getPreIns());
        $stmt->bindValue(':email', $user->getEmail());
        $stmt->bindValue(':mdp', $user->getMdp());
        
        // Exécuter la requête d'insertion
        if ($stmt->execute()) {
            echo "Inscription réussie. Vous pouvez maintenant vous connecter.";
        } else {
            echo "Erreur lors de l'inscription. Veuillez réessayer.";
        }
    } catch (PDOException $e) {
        echo "Echec de la connexion : " . $e->getMessage();
    }
}

// Vérifier si les données du formulaire de connexion ont été soumises
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['connexion'])) {
    // Vérifier les informations d'authentification dans la base de données
    // (à implémenter)
}

// Classe User
class User {
    private $nomIns;
    private $preIns;
    private $email;
    private $mdp;

    public function __construct($nomIns, $preIns, $email, $mdp) {
        $this->nomIns = $nomIns;
        $this->preIns = $preIns;
        $this->email = $email;
        $this->mdp = $mdp;
    }

    public function getNomIns() {
        return $this->nomIns;
    }

    public function getPreIns() {
        return $this->preIns;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getMdp() {
        return $this->mdp;
    }
}
?>
