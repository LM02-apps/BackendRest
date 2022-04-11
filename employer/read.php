<?php
include_once '../config/database.php'; 
include_once '../models/employer.php'; 
$database = new Database(); 
$db = $database->getConnection(); 
$employer = new Employer($db); 
$stmt = $employer->read(); 
$num = $stmt->rowCount(); 
if($num>0)
{   
    $employees_arr = array(); 
    $employees_arr["elenco"] = array(); 

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    { 
        extract($row); 
        $employer_item = array( "id" => $Id, "birth_date" => $Birth_date, "first_name" => $First_name , "last_name" => $last_name ,"gender" => $Gender ,"hire_date" => $Hire_date ); 
        array_push($employees_arr["elenco"], $employer_item); 
    } 
    http_response_code(200); echo json_encode($employees_arr); 
}
    else
    {
        http_response_code(404); 
        echo json_encode( array("message" => "Nessun impiegato trovato.") ); 
    }

 
?>



