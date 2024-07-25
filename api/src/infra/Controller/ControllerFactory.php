<?php

namespace App\infra\Controller;

use App\infra\Controller\CompanyController;


Class ControllerFactory
{

    public function getCompanyController(){
        return CompanyController::class;
    }

}