<?php
// Name: Nintsi Chkhaidze
// Date: April 17, 2026
// Course: IT202
// Section: 006
// Assignment: Phase 5 - JavaScript
// Email: nc582@njit.edu

require_once('database.php');
class CosmeticType
{
    public $cosmetic_type_id;
    public $cosmetic_type_code;
    public $cosmetic_type_name;
    public $cosmetic_shelf_number;

    function __construct($cosmetic_type_id, $cosmetic_type_code, $cosmetic_type_name, $cosmetic_shelf_number)
    {
        $this->cosmetic_type_id = $cosmetic_type_id;
        $this->cosmetic_type_code = $cosmetic_type_code;
        $this->cosmetic_type_name = $cosmetic_type_name;
        $this->cosmetic_shelf_number = $cosmetic_shelf_number;
    }

    function __toString()
    {
        $output = "<h2>$this->cosmetic_type_id - $this->cosmetic_type_code, $this->cosmetic_type_name, $this->cosmetic_shelf_number</h2>\n";
        return $output;
    }

    static function findType($cosmetic_type_id)
    {
        $db = getDB();
        $query = "SELECT * FROM cosmetic_types WHERE cosmetic_type_id = $cosmetic_type_id";
        $result = $db->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if ($row) {
            $type = new CosmeticType(
                $row['cosmetic_type_id'],
                $row['cosmetic_type_code'],
                $row['cosmetic_type_name'],
                $row['cosmetic_shelf_number']
            );
            $db->close();
            return $type;
        } else {
            $db->close();
            return NULL;
        }
    }

    function saveType()
    {
        $db = getDB();
        $query = "INSERT INTO cosmetic_types 
        (cosmetic_type_id, cosmetic_type_code, cosmetic_type_name, cosmetic_shelf_number) 
        VALUES (?, ?, ?, ?)";

        $stmt = $db->prepare($query);
        $stmt->bind_param(
            "isss",
            $this->cosmetic_type_id,
            $this->cosmetic_type_code,
            $this->cosmetic_type_name,
            $this->cosmetic_shelf_number
        );
        $result = $stmt->execute();
        $db->close();
        return $result;
    }

    static function getTypes()
    {
        $db = getDB();
        $query = "SELECT * FROM cosmetic_types";
        $result = $db->query($query);
        if (mysqli_num_rows($result) > 0) {
            $types = array();
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                
                $type = new CosmeticType(
                    $row['cosmetic_type_id'],
                    $row['cosmetic_type_code'],
                    $row['cosmetic_type_name'],
                    $row['cosmetic_shelf_number']
                );
                array_push($types, $type);
                unset($type);
            }
            $db->close();
            return $types;
        } else {
            $db->close();
            return NULL;
        }
    }

    static function getTotalCosmeticTypes()
    {
        $db = getDB();
        $query = "SELECT COUNT(cosmetic_type_id) FROM cosmetic_types";
        $result = $db->query($query);
        $row = $result->fetch_array();
        $db->close();
        if ($row) {
            return $row[0];
        } else {
            return 0;
        }
    }

    function updateType()
   {
       $db = getDB();
       $query = "UPDATE cosmetic_types SET cosmetic_type_code = ?, " .
           "cosmetic_type_name = ?, " . "cosmetic_shelf_number = ? " .
           "WHERE cosmetic_type_id = $this->cosmetic_type_id";
       $stmt = $db->prepare($query);
       $stmt->bind_param(
           "sss",
           $this->cosmetic_type_code,
           $this->cosmetic_type_name,
           $this->cosmetic_shelf_number
       );
       $result = $stmt->execute();
       $db->close();
       return $result;
   }

   function removeType()
   {
       $db = getDB();
       $query = "DELETE FROM cosmetic_types WHERE cosmetic_type_id = $this->cosmetic_type_id";
       $result = $db->query($query);
       $db->close();
       return $result;
   }
}
?>
