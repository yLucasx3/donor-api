<?php

namespace App\Application\DAO;

use App\Application\DAO\Connection;
use \PDO;

class PaymentDAO {
    
    static $conn;

    public function __construct() {

        $connection = Connection::getConnection();
        self::$conn = $connection;
    }

    function show($id) {
        
        try {

            $query = "SELECT * FROM payments WHERE id = :id";

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

    function list($page, $limit) {
        
        try {

            $offset = (--$page) * $limit;

            $countQuery = "SELECT COUNT(*) as count FROM payments;";
            $dataQuery = "SELECT * FROM payments LIMIT :limit OFFSET :offset;";

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

    function create($payment) {

        try {

            $query = "INSERT INTO payments (status, amount, payment_type, donation_id)
                        VALUES (:status, :amount, :payment_type, :donation_id);";
        
            $stm = self::$conn->prepare($query);

            $stm->bindValue(":status", $payment->getStatus());
            $stm->bindValue(":amount", $payment->getAmount());
            $stm->bindValue(":payment_type", $payment->getPaymentType());
            $stm->bindValue(":donation_id", $payment->getDonationId());

            $stm->execute();

            return "Payment created with successfuly.";

        } catch(Exception $e) {

            return $e->getMessage();
        }
    }

    function update($payment) {
        
        try {

            $query = "UPDATE payments SET status = :status, amount = :amount, payment_type = :payment_type, 
                                            donation_id = :donation_id WHERE id = :id";

            $stm = self::$conn->prepare($query);
            
            $stm->bindValue(":id", $payment->getId());
            $stm->bindValue(":status", $payment->getStatus());
            $stm->bindValue(":amount", $payment->getAmount());
            $stm->bindValue(":payment_type", $payment->getPaymentType());
            $stm->bindValue(":donation_id", $payment->getDonationId());

            $stm->execute();

            return "Payment updated with successyfuly";
        } catch(Exception $e) {

            return $e->getMessage();
        }
    }

    function delete($id) {

        try {

            $offset = (--$page) * $limit;

            $countQuery = "SELECT COUNT(*) as count FROM payments;";
            $dataQuery = "SELECT * FROM payments LIMIT :limit OFFSET :offset;";

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
}