<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180319140130 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE person (id INTEGER NOT NULL, first_name CLOB NOT NULL, last_name CLOB NOT NULL, user_name CLOB NOT NULL, password CLOB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TEMPORARY TABLE __temp__ticket AS SELECT id, name, release_on, close, description, urgence FROM ticket');
        $this->addSql('DROP TABLE ticket');
        $this->addSql('CREATE TABLE ticket (id INTEGER NOT NULL, name CLOB NOT NULL COLLATE BINARY, release_on DATETIME NOT NULL, close BOOLEAN NOT NULL, description CLOB NOT NULL COLLATE BINARY, urgence INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO ticket (id, name, release_on, close, description, urgence) SELECT id, name, release_on, close, description, urgence FROM __temp__ticket');
        $this->addSql('DROP TABLE __temp__ticket');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE person');
        $this->addSql('ALTER TABLE ticket ADD COLUMN number_return INTEGER NOT NULL');
    }
}
