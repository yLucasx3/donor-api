<?php

namespace App\Application\DAO;

use App\Application\DAO\Connection;
use \PDO;

class DonationDAO {
    
    static $conn;

    public function __construct() {

        $connection = Connection::getConnection();
        self::$conn = $connection;
    }

    function show($id) {
        
        try {

            $query = "SELECT * FROM donations WHERE id = :id";

            $stm = self::$conn->prepare($query);

            $stm->bindValue(":id", $id);
            $stm->execute();

            while ($row = $stm->fetch(PDO::FETCH_OBJ)){
                $data[] = $row;
            }
            
            return $data;
            
        } catch(Exception $e) {

            return $e->getMessage();
        }
        
    }

    function list($page = 1, $limit = 10) {
        
        try {

            $offset = (--$page) * $limit;

            $countQuery = "SELECT COUNT(*) as count FROM donations;";

            $dataQuery = "SELECT d.id, d.amount, d.donor_id, donors.name as donor, d.description, d.created_at FROM donations d
                            INNER JOIN donors  ON donors.id = d.donor_id
                                LIMIT :limit OFFSET :offset;";

            $stm = self::$conn->prepare($countQuery);
            $stm2 = self::$conn->prepare($dataQuery);

            $stm2->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stm2->bindValue(':offset', $offset, PDO::PARAM_INT);

            $stm->execute();
            $stm2->execute();

            while ($row = $stm2->fetch(PDO::FETCH_OBJ)){
                $data[] = $row;
            }

            $count = $stm->fetch();

            $data['count'] = $count['count'];

            return $data;

        } catch(Exception $e) {

            return $e->getMessage();
        }
    }

    function create($donation) {

        try {

            $query = "INSERT INTO donations (amount, donor_id, created_at, description)
                        VALUES (:amount, :donor_id, :created_at, :description);";
        
            $stm = self::$conn->prepare($query);

            $stm->bindValue(":amount", $donation->getAmount());
            $stm->bindValue(":donor_id", $donation->getDonorId());
            $stm->bindValue(":created_at", $donation->getCreatedAt());
            $stm->bindValue(":description", $donation->getDescription());

            $stm->execute();

            return "Donation created with successfuly.";

        } catch(Exception $e) {

            return $e->getMessage();
        }
    }

    function update($donation) {
        
        try {

            $query = "UPDATE donations SET amount = :amount, donor_id = :donor_id, 
                                            created_at = :created_at, description = :description
                                                WHERE id = :id";

            $stm = self::$conn->prepare($query);
            
            $stm->bindValue(":id", $donation->getId());
            $stm->bindValue(":amount", $donation->getAmount());
            $stm->bindValue(":donor_id", $donation->getDonorId());
            $stm->bindValue(":created_at", $donation->getCreatedAt());
            $stm->bindValue(":description", $donation->getDescription());

            $stm->execute();

            return "Donation updated with successyfuly";
        } catch(Exception $e) {

            return $e->getMessage();
        }
    }

    function delete($id) {

        try {

            $query = "DELETE FROM donations WHERE id = :id";

            $stm = self::$conn->prepare($query);
            
            $stm->bindValue(":id", $id);

            $stm->execute();

            return "Donation deleted with successyfuly";

        } catch(Exception $e) {

            return $e->getMessage();
        }
    }
}