<?php
/**
 * Created by PhpStorm.
 * User: mjdem
 * Date: 28-09-2018
 * Time: 02:34 PM
 */

namespace App\Helper;


use App\Models\Client;
use App\Models\Employee;

class Validator
{

    public function validateEmployeePhone($value){

        if(Employee::where('employee_phone', $value)->count() === 0){

            return false;
        }
        else{

            return true;
        }
    }

    public function validateEmployeeEmail($value){

        if(Employee::where('employee_email', $value)->count() === 0){

            return false;
        }
        else{

            return true;
        }
    }

    public function validateClientPhone($value){

        if(Client::where('client_phone', $value)->count() === 0){

            return false;
        }
        else{

            return true;
        }
    }
}