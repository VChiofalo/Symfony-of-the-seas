<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221209111208 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles CHANGE contents contents LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE results CHANGE label label LONGTEXT NOT NULL, CHANGE min min INT NOT NULL, CHANGE max max INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles CHANGE contents contents VARCHAR(900) NOT NULL');
        $this->addSql('ALTER TABLE results CHANGE min min VARCHAR(255) NOT NULL, CHANGE max max VARCHAR(255) NOT NULL, CHANGE label label VARCHAR(255) NOT NULL');
    }
}
