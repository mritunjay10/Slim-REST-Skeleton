<?php
/**
 * Created by PhpStorm.
 * User: mritunjay
 * Date: 7/5/19
 * Time: 11:59 AM
 */

namespace App\Helper;


class ExceptionHandler
{
    public function __invoke($request, $response, $exception) {

        $data['error'] = 'FAILED_TO_HANDEL_REQUEST';
        $data['response'] = (object)null;

        $response =  $response->withJson($data, 503, JSON_PRETTY_PRINT);

        return $response;
    }
}