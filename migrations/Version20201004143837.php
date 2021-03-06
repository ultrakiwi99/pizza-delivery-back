<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201004143837 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
       $this->addSql('CREATE TABLE IF NOT EXISTS products (
           products_id string not null,
           product_name string not null,
           product_description string,
           price_cents int not null
       )');
       $this->addSql('CREATE TABLE IF NOT EXISTS instock (
           product_id string not null,
           instock int not null
       )');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE instock');
        $this->addSql('DROP TABLE products');
    }
}
