<?php
$mysqli = new mysqli("localhost", "gebruikersnaam", "wachtwoord", "goldenbulls");

    
function filteration($data) {
    // Controleer of $data een array is
    if (is_array($data)) {
        // Loop door alle elementen in de array en pas filter_var toe
        foreach ($data as $key => $value) {
            $data[$key] = filter_var($value, FILTER_SANITIZE_STRING);
        }
    } else {
        // Als $data geen array is, pas filter_var direct toe
        $data = filter_var($data, FILTER_SANITIZE_STRING);
    }

    // Geef de gefilterde gegevens terug
    return $data;
}

function insert($sql, $values, $datatypes) {
    $mysqli = new mysqli("localhost", "gebruikersnaam", "wachtwoord", "database_naam");

    // Controleer de verbinding
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Voorbereid de SQL-statement
    $stmt = $mysqli->prepare($sql);

    // Controleer op fouten bij het voorbereiden
    if ($stmt === false) {
        die("Error in preparing statement: " . $mysqli->error);
    }

    // Bind parameters met datatypes
    $stmt->bind_param($datatypes, ...$values);

    // Voer de query uit
    $stmt->execute();

    // Haal het aantal getroffen rijen op
    $result = $stmt->affected_rows;

    // Sluit de statement
    $stmt->close();

    // Sluit de databaseverbinding
    $mysqli->close();

    // Retourneer het resultaat
    return $result;
}



if(isset($_POST['send']))
{
    $frm_data = filteration($_POST);

    $q = "INSERT INTO `user_queries`(, `naam`, `email`, `onderwerp`, `bericht`,) VALUES (?,?,?,?)";
    $values =[$frm_data['naam'],$frm_data['email'],$frm_data['onderwerp'],$frm_data['bericht']];

    $res = insert($q, $values, 'ssss');
    if($res==1){
        alert('succes', 'email verstuurd!');
    }
    else{
        alert('mislukt', 'server down');
    }

}

$contact_q = "SELECT * FROM 'contact_details' WHERE 'sr_no'=?";
$values = [1];
$contact_r = mysqli_fetch_assoc(select($contact_q,$values,'i'));
?>