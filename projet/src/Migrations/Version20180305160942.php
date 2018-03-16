<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180305160942 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE ticket (id INTEGER NOT NULL, name CLOB NOT NULL, release_on DATETIME NOT NULL,close BOOLEAN NOT NULL,description CLOB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE competence (id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE batiment (id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE poste (id INTEGER NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE ticket');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE batiment');
        $this->addSql('DROP TABLE poste');
    }
}
