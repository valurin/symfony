<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180321083509 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE type (id INTEGER NOT NULL, type CLOB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE machine (id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE ticket ADD COLUMN number_return INTEGER NOT NULL');
        $this->addSql('ALTER TABLE batiment ADD COLUMN name CLOB NOT NULL');
        $this->addSql('CREATE TEMPORARY TABLE __temp__poste AS SELECT id FROM poste');
        $this->addSql('DROP TABLE poste');
        $this->addSql('CREATE TABLE poste (id INTEGER NOT NULL, batiment_id INTEGER DEFAULT NULL, name CLOB NOT NULL, PRIMARY KEY(id), CONSTRAINT FK_7C890FABD6F6891B FOREIGN KEY (batiment_id) REFERENCES batiment (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO poste (id) SELECT id FROM __temp__poste');
        $this->addSql('DROP TABLE __temp__poste');
        $this->addSql('CREATE INDEX IDX_7C890FABD6F6891B ON poste (batiment_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE machine');
        $this->addSql('CREATE TEMPORARY TABLE __temp__batiment AS SELECT id FROM batiment');
        $this->addSql('DROP TABLE batiment');
        $this->addSql('CREATE TABLE batiment (id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO batiment (id) SELECT id FROM __temp__batiment');
        $this->addSql('DROP TABLE __temp__batiment');
        $this->addSql('DROP INDEX IDX_7C890FABD6F6891B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__poste AS SELECT id FROM poste');
        $this->addSql('DROP TABLE poste');
        $this->addSql('CREATE TABLE poste (id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO poste (id) SELECT id FROM __temp__poste');
        $this->addSql('DROP TABLE __temp__poste');
        $this->addSql('CREATE TEMPORARY TABLE __temp__ticket AS SELECT id, name, release_on, close, description, urgence FROM ticket');
        $this->addSql('DROP TABLE ticket');
        $this->addSql('CREATE TABLE ticket (id INTEGER NOT NULL, name CLOB NOT NULL, release_on DATETIME NOT NULL, close BOOLEAN NOT NULL, description CLOB NOT NULL, urgence INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO ticket (id, name, release_on, close, description, urgence) SELECT id, name, release_on, close, description, urgence FROM __temp__ticket');
        $this->addSql('DROP TABLE __temp__ticket');
    }
}
