<?php 
$database = "mydb";
$user = "wilber";
$password = "wil99";
$host = "docker-mysql";

$connection = new PDO("mysql:host={$host};dbname={$database};charset=utf8", $user, $password);

if(!$connection){
    echo "Base de datos no conectada, cheque su cadena de coneccion";
}
else {

    $xml = new DOMDocument("1.0");

    $result = $connection->prepare("SELECT * FROM user");
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result->execute();


    $xml->formatOutput=true;
    $users=$xml->createElement("users");
    $xml->appendChild($users);

    while ($row = $result->fetch()){
        $user=$xml->createElement("user");
        $users->appendChild($user);

        $id=$xml->createElement("id", $row['id']);
        $user->appendChild($id);       

        $nombre=$xml->createElement("nombre", $row['firstName']);
        $user->appendChild($nombre);

        $apellido=$xml->createElement("apellido", $row['lastName']);
        $user->appendChild($apellido);

        $email=$xml->createElement("email", $row['email']);
        $user->appendChild($email);
    }

    echo "<xmp>".$xml->saveXML()."</xmp>";
    echo 'Escrito: ' . $xml->save("test.xml") . ' bytes'; 
}
?>