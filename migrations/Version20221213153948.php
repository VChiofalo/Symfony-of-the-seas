<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221213153948 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles ADD thumbnail VARCHAR(255) NOT NULL, ADD description VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE workshops ADD contents LONGTEXT NOT NULL, ADD thumbnail VARCHAR(255) NOT NULL, ADD date DATE DEFAULT NULL, ADD slug VARCHAR(255) NOT NULL, ADD description VARCHAR(255) NOT NULL, CHANGE label title VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles DROP thumbnail, DROP description');
        $this->addSql('ALTER TABLE workshops ADD label VARCHAR(255) NOT NULL, DROP title, DROP contents, DROP thumbnail, DROP date, DROP slug, DROP description');
    }
}
