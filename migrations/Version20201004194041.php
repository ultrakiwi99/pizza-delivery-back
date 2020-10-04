<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201004194041 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
       $this->addSql('CREATE TABLE IF NOT EXISTS categories (
           category_id string not null,
           category_name string not null,
           category_description string
       )');
       $this->addSql('CREATE TABLE IF NOT EXISTS product_to_categories (
           product_id string not null,
           category_id string int not null
       )');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE instock');
        $this->addSql('DROP TABLE products');
    }
}
