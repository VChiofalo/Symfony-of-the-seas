<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221214153756 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE testimonials (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, age INT NOT NULL, content VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articles ADD thumbnail VARCHAR(255) NOT NULL, ADD description VARCHAR(255) NOT NULL, DROP date');
        $this->addSql('ALTER TABLE workshops ADD contents LONGTEXT NOT NULL, ADD thumbnail VARCHAR(255) NOT NULL, ADD date DATE DEFAULT NULL, ADD slug VARCHAR(255) NOT NULL, ADD description VARCHAR(255) NOT NULL, CHANGE label title VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE testimonials');
        $this->addSql('ALTER TABLE articles ADD date DATE DEFAULT NULL, DROP thumbnail, DROP description');
        $this->addSql('ALTER TABLE workshops ADD label VARCHAR(255) NOT NULL, DROP title, DROP contents, DROP thumbnail, DROP date, DROP slug, DROP description');
    }
}
