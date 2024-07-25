<?php

namespace App\infra\Controller;

use App\infra\Controller\CompanyController;
use App\infra\Controller\AssociateController;


Class ControllerFactory
{

    public function getCompanyController(){
        return CompanyController::class;
    }

    public function getAssociateController(){
        return AssociateController::class;
    }

}