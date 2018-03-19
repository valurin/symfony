<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180319141149 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE ticket (id INTEGER NOT NULL, name CLOB NOT NULL, release_on DATETIME NOT NULL, close BOOLEAN NOT NULL, description CLOB NOT NULL, urgence INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE competence (id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE batiment (id INTEGER NOT NULL, name CLOB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE type (id INTEGER NOT NULL, type CLOB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE machine (id INTEGER NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE poste (id INTEGER NOT NULL, batiment_id INTEGER DEFAULT NULL, name CLOB NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7C890FABD6F6891B ON poste (batiment_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE ticket');
        $this->addSql('DROP TABLE competence');
        $this->addSql('DROP TABLE batiment');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE machine');
        $this->addSql('DROP TABLE poste');
    }
}
