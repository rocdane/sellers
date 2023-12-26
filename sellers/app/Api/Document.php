<?php

namespace App\Api;

class Document
{
    private string $title;
    private string $terms;
    private string $payment;

    public function __construct($title, $terms, $payment) {
        $this->title = $title;
        $this->terms = $terms;
        $this->payment = $payment;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getTerms(){
        return $this->terms;
    }

    public function getPayment(){
        return $this->payment;
    }
}