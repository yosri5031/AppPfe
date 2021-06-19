<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210611091635 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY matiere_ibfk_1');
        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY matiere_ibfk_2');
        $this->addSql('DROP INDEX id_periode ON matiere');
        $this->addSql('DROP INDEX id_dept ON matiere');
        $this->addSql('ALTER TABLE matiere ADD id_student INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matiere DROP id_student');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT matiere_ibfk_1 FOREIGN KEY (id_dept) REFERENCES department (id)');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT matiere_ibfk_2 FOREIGN KEY (id_periode) REFERENCES periodes (id)');
        $this->addSql('CREATE INDEX id_periode ON matiere (id_periode)');
        $this->addSql('CREATE INDEX id_dept ON matiere (id_dept)');
    }
}
