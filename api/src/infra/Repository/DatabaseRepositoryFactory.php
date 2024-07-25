<?php

namespace App\RepositoryFactory;
use App\Repositorys\CompanyRepositoryDatabase;

Class RepositoryFactory{

    public function getCompanyRepository(){
        return new CompanyRepositoryDatabase();
    }

}