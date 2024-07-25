<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240724232100 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Generated migration to create companys table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE companys (id uuid default gen_random_uuid(), name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE companys');
    }
}
