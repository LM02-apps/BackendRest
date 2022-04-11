<?php
class Employer
{
    private $conn;
    private $table_name = "employees";
    
    public $id;
    public $birthdate;
    public $first_name;
    public $last_name;
    public $gender;
    public $hire_date;
    // costruttore
    public function __construct($db)
    {
        $this->conn = $db;
    }
    // READ libri
    function read()
    {
        // select all
        $query = "SELECT a.id, a.birthdate, a.first_name, a.last_name, a.gender, a.hire_date FROM " . $this->table_name . " a ";
        $stmt = $this->conn->prepare($query);
        // execute query
        $stmt->execute();
        return $stmt;
    }
    //CREA LIBRI
    function create()
    {

        $query = "INSERT INTO " . $this->table_name . " SET id=:Id, birth_date=:Birth_date, first_name=:First_name, last_name=:Last_name, gender=:Gender, hire_date=:Hire_date";
        
        
        $stmt = $this->conn->prepare($query);
        
        
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->birth_date = htmlspecialchars(strip_tags($this->birth_date));
        $this->first_name = htmlspecialchars(strip_tags($this->first_name));
        $this->last_name = htmlspecialchars(strip_tags($this->last_name));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->hire_date = htmlspecialchars(strip_tags($this->hire_date));
        
        // binding
        $stmt->bindParam(":Id", $this->id);
        $stmt->bindParam(":Birth_date", $this->birth_date);
        $stmt->bindParam(":First_name", $this->first_name);
        $stmt->bindParam(":Last_name", $this->last_name);
        $stmt->bindParam(":Gender", $this->gender);
        $stmt->bindParam(":Hire_date",$this->hire_date);
        // execute query
        if($stmt->execute())
        {
            return true;
        }
        return false;
        
    }
    // AGGIORNARE LIBRO
    function update()
    {

        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    id = :Id,
                    birth_date = :Birth_date,
                    first_name=:First_name,
                    last_name=:Last_name,
                    gender=:Gender,
                    hire_date=:Hire_date
                WHERE
                    id = :Id";
    
        $stmt = $this->conn->prepare($query);
    
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->birth_date = htmlspecialchars(strip_tags($this->birth_date));
        $this->first_name = htmlspecialchars(strip_tags($this->first_name));
        $this->last_name = htmlspecialchars(strip_tags($this->last_name));
        $this->gender = htmlspecialchars(strip_tags($this->gender));
        $this->hire_date = htmlspecialchars(strip_tags($this->hire_date));
    
        // binding
        $stmt->bindParam(":Id", $this->id);
        $stmt->bindParam(":Birth_date", $this->birth_date);
        $stmt->bindParam(":First_name", $this->first_name);
        $stmt->bindParam(":Last_name", $this->last_name);
        $stmt->bindParam(":Gender", $this->gender);
        $stmt->bindParam(":Hire_date", $this->hire_date);
    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    // CANCELLARE LIBRO
    function delete()
    {

        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
    
    
        $stmt = $this->conn->prepare($query);
    
        $this->id = htmlspecialchars(strip_tags($this->id));
    
    
        $stmt->bindParam(1, $this->id);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    
    }
}
?>