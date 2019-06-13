<?php

/**
 * Created by PhpStorm.
 * User: mjdem
 * Date: 11-07-2018
 * Time: 02:18 PM
 */
namespace App\Helper;

class INDIMail
{
    private static $from = '';

    public static function send_mail($to, $subject, $link, $data){

        $message = file_get_contents($link.'?'.http_build_query($data));

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $headers .= 'From: '.self::$from."\r\n".
            'X-Mailer: PHP/' .  phpversion();

        if(mail($to, $subject, $message, $headers)) {

            return true;

        } else {

            return false;
        }
    }

}