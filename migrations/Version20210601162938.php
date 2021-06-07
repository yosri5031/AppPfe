<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210601162938 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE matiers (id INT AUTO_INCREMENT NOT NULL, id_periode INT NOT NULL, id_classe INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE departements ADD id INT AUTO_INCREMENT NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE periode CHANGE annee annee INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE matiers');
        $this->addSql('ALTER TABLE departements MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE departements DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE departements DROP id');
        $this->addSql('ALTER TABLE departements ADD PRIMARY KEY (id_departments)');
        $this->addSql('ALTER TABLE periode CHANGE annee annee INT NOT NULL');
    }
}
