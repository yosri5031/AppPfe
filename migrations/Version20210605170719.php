<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210605170719 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom_utilisateur VARCHAR(255) NOT NULL, mot_de_passe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE matiers DROP FOREIGN KEY matiers_ibfk_1');
        $this->addSql('ALTER TABLE matiers DROP FOREIGN KEY matiers_ibfk_2');
        $this->addSql('ALTER TABLE matiers DROP FOREIGN KEY matiers_ibfk_3');
        $this->addSql('DROP INDEX id_classe ON matiers');
        $this->addSql('DROP INDEX id_department ON matiers');
        $this->addSql('DROP INDEX id_periode ON matiers');
        $this->addSql('ALTER TABLE periode CHANGE annee annã©e INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('ALTER TABLE matiers ADD CONSTRAINT matiers_ibfk_1 FOREIGN KEY (id_classe) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE matiers ADD CONSTRAINT matiers_ibfk_2 FOREIGN KEY (id_department) REFERENCES departments (id)');
        $this->addSql('ALTER TABLE matiers ADD CONSTRAINT matiers_ibfk_3 FOREIGN KEY (id_periode) REFERENCES periode (id)');
        $this->addSql('CREATE INDEX id_classe ON matiers (id_classe)');
        $this->addSql('CREATE INDEX id_department ON matiers (id_department)');
        $this->addSql('CREATE INDEX id_periode ON matiers (id_periode)');
        $this->addSql('ALTER TABLE periode CHANGE annã©e annee INT NOT NULL');
    }
}
