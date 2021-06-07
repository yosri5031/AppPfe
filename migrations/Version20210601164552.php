<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210601164552 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE departments (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE matiers DROP FOREIGN KEY matiers_ibfk_1');
        $this->addSql('ALTER TABLE matiers DROP FOREIGN KEY matiers_ibfk_2');
        $this->addSql('DROP INDEX id_classe ON matiers');
        $this->addSql('DROP INDEX id_periode ON matiers');
        $this->addSql('ALTER TABLE periode CHANGE annee annee INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE departments');
        $this->addSql('ALTER TABLE matiers ADD CONSTRAINT matiers_ibfk_1 FOREIGN KEY (id_classe) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE matiers ADD CONSTRAINT matiers_ibfk_2 FOREIGN KEY (id_periode) REFERENCES periode (id)');
        $this->addSql('CREATE INDEX id_classe ON matiers (id_classe)');
        $this->addSql('CREATE INDEX id_periode ON matiers (id_periode)');
        $this->addSql('ALTER TABLE periode CHANGE annee annee INT NOT NULL');
    }
}
