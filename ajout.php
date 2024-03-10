<?php
require("connect.php");
require("Personne.php");
$dsn = "mysql:host=" . SERVER . ";dbname=" . BASE;
try {
    $conn = new PDO($dsn, USER, PASSWD);
    echo "Connexion réussie ! ";
} catch (PDOException $e) {
    echo "Echec de la connexion : " . $e->getMessage();
    exit();
}
function chargerClass($classname)
{
    require $classname.'.php';
}
spl_autoload_register("chargerClass");
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
$manager = new DBconnect($conn);
if (isset($_POST['ajout'])){
$donnees = array ('photo' => $_POST['photo'],
   'nom' => $_POST['txtName'],
   'adresse' => $_POST['adresse'],
   'email' => $_POST['mail'],
   'vsite' => $_POST['txtSite'],
   'telephone' => $_POST['txtPhone'],
   'experience' => $_POST['txtExperience'],
   'formation' => $_POST['txtFormation'],
   'competance' => $_POST['txtCompetance'],
   'skills' => $_POST['txtSkills']);

$personne=new Personne($donnees);
$manager->ajout($personne);
}
$data=urlencode(serialize($personne));
header("Location: cv.php?donnee=$data");
exit();
 ?>