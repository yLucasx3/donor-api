<?php

namespace App\Application\Model;

class Payment {

    private $id;
    private $status;
    private $amount;
    private $payment_type;
    private $donation_id;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of amount
     */ 
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @return  self
     */ 
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get the value of payment_type
     */ 
    public function getPaymentType()
    {
        return $this->payment_type;
    }

    /**
     * Set the value of payment_type
     *
     * @return  self
     */ 
    public function setPaymentType($payment_type)
    {
        $this->payment_type = $payment_type;

        return $this;
    }

    /**
     * Get the value of donation_id
     */ 
    public function getDonationId()
    {
        return $this->donation_id;
    }

    /**
     * Set the value of donation_id
     *
     * @return  self
     */ 
    public function setDonationId($donation_id)
    {
        $this->donation_id = $donation_id;

        return $this;
    }
}