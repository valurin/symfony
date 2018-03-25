<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180323131221 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__person AS SELECT id, first_name, last_name, user_name, password FROM person');
        $this->addSql('DROP TABLE person');
        $this->addSql('CREATE TABLE person (id INTEGER NOT NULL, first_name CLOB NOT NULL COLLATE BINARY, last_name CLOB NOT NULL COLLATE BINARY, password CLOB NOT NULL COLLATE BINARY, username CLOB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO person (id, first_name, last_name, username, password) SELECT id, first_name, last_name, user_name, password FROM __temp__person');
        $this->addSql('DROP TABLE __temp__person');
        $this->addSql('DROP INDEX IDX_7C890FABD6F6891B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__poste AS SELECT id, batiment_id, name FROM poste');
        $this->addSql('DROP TABLE poste');
        $this->addSql('CREATE TABLE poste (id INTEGER NOT NULL, batiment_id INTEGER DEFAULT NULL, name CLOB NOT NULL COLLATE BINARY, PRIMARY KEY(id), CONSTRAINT FK_7C890FABD6F6891B FOREIGN KEY (batiment_id) REFERENCES batiment (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO poste (id, batiment_id, name) SELECT id, batiment_id, name FROM __temp__poste');
        $this->addSql('DROP TABLE __temp__poste');
        $this->addSql('CREATE INDEX IDX_7C890FABD6F6891B ON poste (batiment_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__person AS SELECT id, first_name, last_name, username, password FROM person');
        $this->addSql('DROP TABLE person');
        $this->addSql('CREATE TABLE person (id INTEGER NOT NULL, first_name CLOB NOT NULL, last_name CLOB NOT NULL, password CLOB NOT NULL, user_name CLOB NOT NULL COLLATE BINARY, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO person (id, first_name, last_name, user_name, password) SELECT id, first_name, last_name, username, password FROM __temp__person');
        $this->addSql('DROP TABLE __temp__person');
        $this->addSql('DROP INDEX IDX_7C890FABD6F6891B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__poste AS SELECT id, batiment_id, name FROM poste');
        $this->addSql('DROP TABLE poste');
        $this->addSql('CREATE TABLE poste (id INTEGER NOT NULL, batiment_id INTEGER DEFAULT NULL, name CLOB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO poste (id, batiment_id, name) SELECT id, batiment_id, name FROM __temp__poste');
        $this->addSql('DROP TABLE __temp__poste');
        $this->addSql('CREATE INDEX IDX_7C890FABD6F6891B ON poste (batiment_id)');
    }
}
