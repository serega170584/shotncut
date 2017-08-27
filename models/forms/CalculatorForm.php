<?php


namespace app\models\forms;


interface CalculatorForm
{
    public function validate();
    public function prepareRequest();
    public function getProductName();
}