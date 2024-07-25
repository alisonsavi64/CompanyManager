<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240725012100 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Generated migration to create companys table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE associates (id uuid default gen_random_uuid(), name VARCHAR(255) NOT NULL, company_id uuid, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE associates ADD CONSTRAINT fk_associates_company_id FOREIGN KEY (company_id) REFERENCES companys (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE associates');
    }
}
