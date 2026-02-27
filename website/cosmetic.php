<?php
require_once('database.php');
class Cosmetic
{
    // Name: Nintsi Chkhaidze
// Date: February 27, 2026
// Course: IT202
// Section: 006
// Assignment: Phase 2 - CRUD Categories and Items
// Email: nc582@njit.edu

    public $cosmetic_id;
    public $cosmetic_type_id;
    public $cosmetic_code;
    public $cosmetic_name;
    public $cosmetic_description;
    public $cosmetic_shade;
    public $cosmetic_finish;
    public $cosmetic_buy_price;
    public $cosmetic_sell_price;

    function __construct($cosmetic_id, $cosmetic_type_id, $cosmetic_code, $cosmetic_name, $cosmetic_description, $cosmetic_shade, $cosmetic_finish, $cosmetic_buy_price, $cosmetic_sell_price)
    {
        $this->cosmetic_id = $cosmetic_id;
        $this->cosmetic_type_id = $cosmetic_type_id;
        $this->cosmetic_code = $cosmetic_code;
        $this->cosmetic_name = $cosmetic_name;
        $this->cosmetic_description = $cosmetic_description;
        $this->cosmetic_shade = $cosmetic_shade;
        $this->cosmetic_finish = $cosmetic_finish;
        $this->cosmetic_buy_price = $cosmetic_buy_price;
        $this->cosmetic_sell_price = $cosmetic_sell_price;
    }

    static function findCosmetic($cosmetic_id)
    {
        $db = getDB();
        $query = "SELECT * FROM cosmetics WHERE cosmetic_id = $cosmetic_id";
        $result = $db->query($query);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if ($row) {
            $type = new Cosmetic(
                $row['cosmetic_id'],
                $row['cosmetic_type_id'],
                $row['cosmetic_code'],
                $row['cosmetic_name'],
                $row['cosmetic_description'],
                $row['cosmetic_shade'],
                $row['cosmetic_finish'],
                $row['cosmetic_buy_price'],
                $row['cosmetic_sell_price']
            );
            $db->close();
            return $type;
        } else {
            $db->close();
            return NULL;
        }
    }

    function saveCosmetic()
    {
        $db = getDB();
        $query = "INSERT INTO cosmetics
        (cosmetic_id, cosmetic_type_id, cosmetic_code, cosmetic_name, cosmetic_shade, cosmetic_finish, cosmetic_description, cosmetic_sell_price, cosmetic_buy_price) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $db->prepare($query);
        $stmt->bind_param(
            "iisssssdd",
            $this->cosmetic_id,
            $this->cosmetic_type_id,
            $this->cosmetic_code,
            $this->cosmetic_name,
            $this->cosmetic_shade,
            $this->cosmetic_finish,
            $this->cosmetic_description,
            $this->cosmetic_buy_price,
            $this->cosmetic_sell_price,
        );
        $result = $stmt->execute();
        $db->close();
        return $result;
    }

    static function getCosmetics()
    {
        $db = getDB();
        $query = "SELECT * FROM cosmetics";
        $result = $db->query($query);
        if (mysqli_num_rows($result) > 0) {
            $types = array();
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                
                $type = new Cosmetic(
                    $row['cosmetic_id'],
                    $row['cosmetic_type_id'],
                    $row['cosmetic_code'],
                    $row['cosmetic_name'],
                    $row['cosmetic_description'],
                    $row['cosmetic_shade'],
                    $row['cosmetic_finish'],
                    $row['cosmetic_buy_price'],  
                    $row['cosmetic_sell_price'] 
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

    function updateCosmetic()
    {
        $db = getDB();
        $query = "UPDATE cosmetics SET " .
            "cosmetic_code = ?, " .
            "cosmetic_name = ?, " .
            "cosmetic_type_id = ?, " .
            "cosmetic_shade = ?, " .
            "cosmetic_finish = ?, " .
            "cosmetic_description = ?, " .
            "cosmetic_buy_price = ?, " .
            "cosmetic_sell_price = ? " .
            "WHERE cosmetic_id = $this->cosmetic_id";
        $stmt = $db->prepare($query);
        $stmt->bind_param(
            "ssisssdd",
            $this->cosmetic_code,
            $this->cosmetic_name,
            $this->cosmetic_type_id,
            $this->cosmetic_shade,
            $this->cosmetic_finish,
            $this->cosmetic_description,
            $this->cosmetic_buy_price,
            $this->cosmetic_sell_price
        );
        $result = $stmt->execute();
        $db->close();
        return $result;
    }

    function removeCosmetic()
   {
       $db = getDB();
       $query = "DELETE FROM cosmetics WHERE cosmetic_id = $this->cosmetic_id";
       $result = $db->query($query);
       $db->close();
       return $result;
   }
}
?>