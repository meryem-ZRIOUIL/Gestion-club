<?php
include 'connexion.php'; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
    $sql = $conn->prepare("INSERT INTO Utilisateur (nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?)");
    
    $sql->bind_param("ssss", $nom, $prenom, $email, $mot_de_passe);

   
    if ($sql->execute()) {
        echo "Nouvel enregistrement créé avec succès";
    } else {
        echo "Erreur : " . $sql->error;
    }

    
    $sql->close();
} else {
    echo "Méthode non autorisée."; 
}

$conn->close();
?>
