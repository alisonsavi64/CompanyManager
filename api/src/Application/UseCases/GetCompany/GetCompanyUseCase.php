<?php

namespace App\application\useCases\getCompany;

use App\Domain\Entity\Company;

class GetCompanyUseCase
{
    public function execute($input)
    {
        $company = new Company(null, $input['name']); 

        // Return a response
        return [
            'message' => 'Company created successfully',
            'company' => $company,
        ];
    }
}
