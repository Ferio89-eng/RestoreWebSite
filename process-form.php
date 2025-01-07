<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati del form
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $messaggio = $_POST['messaggio'];
    
    // Email del destinatario
    $to = "tuo@email.it";
    
    // Oggetto dell'email
    $subject = "Nuovo messaggio dal sito web";
    
    // Corpo dell'email
    $email_content = "Nome: $nome\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Messaggio:\n$messaggio\n";
    
    // Headers
    $headers = "From: $nome <$email>";
    
    // Invia l'email
    if(mail($to, $subject, $email_content, $headers)) {
        $response = ["success" => true, "message" => "Messaggio inviato con successo!"];
    } else {
        $response = ["success" => false, "message" => "Errore nell'invio del messaggio."];
    }
    
    // Restituisce la risposta in formato JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>