<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180316082824 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('ALTER TABLE ticket ADD COLUMN close BOOLEAN');
        $this->addSql('ALTER TABLE ticket ADD COLUMN description CLOB');
        $this->addSql('ALTER TABLE ticket ADD COLUMN urgence INTEGER');
        $this->addSql('ALTER TABLE ticket ADD COLUMN number_return INTEGER');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__ticket AS SELECT id, name, release_on FROM ticket');
        $this->addSql('DROP TABLE ticket');
        $this->addSql('CREATE TABLE ticket (id INTEGER NOT NULL, name CLOB NOT NULL, release_on DATETIME NOT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO ticket (id, name, release_on) SELECT id, name, release_on FROM __temp__ticket');
        $this->addSql('DROP TABLE __temp__ticket');
    }
}
