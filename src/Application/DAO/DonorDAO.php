<?php

namespace App\Application\DAO;

use App\Application\DAO\Connection;
use \PDO;

class DonorDAO {
    
    static $conn;

    public function __construct() {

        $connection = Connection::getConnection();
        self::$conn = $connection;
    }

    public function create($donor) {

        try {

            $query = "INSERT INTO donors ( name, email, cpf, birth_date, donation_interval, phone_number, public_place, zip_code, number, complement, city, state, created_at) 
                        VALUES( :name, :email, :cpf, :birth_date, :donation_interval, :phone_number, :public_place, :zip_code, :number, :complement, :city, :state, :created_at);";
        
            $stm = self::$conn->prepare($query);

            $stm->bindValue(":name", $donor->getName());
            $stm->bindValue(":email", $donor->getEmail());
            $stm->bindValue(":cpf", $donor->getCpf());
            $stm->bindValue(":birth_date", $donor->getBirthDate());
            $stm->bindValue(":donation_interval", $donor->getDonationInterval());
            $stm->bindValue(":phone_number", $donor->getPhoneNumber());
            $stm->bindValue(":public_place", $donor->getPublicPlace());
            $stm->bindValue(":number", $donor->getNumber());
            $stm->bindValue(":zip_code", $donor->getZipCode());
            $stm->bindValue(":complement", $donor->getComplement());
            $stm->bindValue(":city", $donor->getCity());
            $stm->bindValue(":state", $donor->getState());
            $stm->bindValue(":created_at", $donor->getCreatedAt());

            $stm->execute();

            return "Donor created with success.";

        } catch(Exception $e) {

            return $e->getMessage();
        }
        
    }

    public function list($page, $limit) {

        try {

            $offset = (--$page) * $limit;

            $countQuery = "SELECT COUNT(*) as count FROM donors;";
            $dataQuery = "SELECT * FROM donors LIMIT :limit OFFSET :offset;";

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

        } catch (Exception $e) {
            
            return $e->getMessage();
        }
    }

    public function show($id) {

        try {

            $query = "SELECT * FROM donors WHERE id = :id";

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

    public function update($donor) {
        
        try {
            $query = "UPDATE donors SET name = :name, email = :email, cpf = :cpf, birth_date = :birth_date,
            donation_interval = :donation_interval, phone_number = :phone_number,
                public_place = :public_place, zip_code = :zip_code, number = :number,
                    complement = :complement, city = :city, state = :state,
                        updated_at = :updated_at WHERE id = :id;";

            $stm = self::$conn->prepare($query);

            $stm->bindValue("id", $donor->getId());
            $stm->bindValue(":name", $donor->getName());
            $stm->bindValue(":email", $donor->getEmail());
            $stm->bindValue(":cpf", $donor->getCpf());
            $stm->bindValue(":birth_date", $donor->getBirthDate());
            $stm->bindValue(":donation_interval", $donor->getDonationInterval());
            $stm->bindValue(":phone_number", $donor->getPhoneNumber());
            $stm->bindValue(":public_place", $donor->getPublicPlace());
            $stm->bindValue(":number", $donor->getNumber());
            $stm->bindValue(":zip_code", $donor->getZipCode());
            $stm->bindValue(":complement", $donor->getComplement());
            $stm->bindValue(":city", $donor->getCity());
            $stm->bindValue(":state", $donor->getState());
            $stm->bindValue(":updated_at", $donor->getUpdatedAt());

            $stm->execute();

            return "Donor as updated successfully";

        } catch(Exception $e) {

            return $e->getMessage();
        }

    }

    public function delete($id) {

        try {

            $query = "DELETE FROM donors WHERE id = :id;";

            $stm = self::$conn->prepare($query);

            $stm->bindValue("id", $id);

            $stm->execute();

            return "Donor deleted with successufuly";

        } catch (Exception $e) {

            return $e->getMessage();
        }
    }
}