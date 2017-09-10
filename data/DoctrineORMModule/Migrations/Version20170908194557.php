<?php

namespace DoctrineORMModule\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170908194557 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE entity (id INT UNSIGNED AUTO_INCREMENT NOT NULL, namespace VARCHAR(255) NOT NULL, mnemo VARCHAR(32) NOT NULL, hidden SMALLINT NOT NULL, moduleId INT UNSIGNED DEFAULT NULL, INDEX IDX_E284468A5ED6481 (moduleId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE module (id INT UNSIGNED AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, mnemo VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C2426285E237E06 (name), UNIQUE INDEX UNIQ_C2426283F3BA439 (mnemo), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hello_first (id INT UNSIGNED AUTO_INCREMENT NOT NULL, type VARCHAR(32) NOT NULL, createdAt DATETIME NOT NULL, fullName VARCHAR(255) NOT NULL, phone INT NOT NULL, email VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE entity ADD CONSTRAINT FK_E284468A5ED6481 FOREIGN KEY (moduleId) REFERENCES module (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE entity DROP FOREIGN KEY FK_E284468A5ED6481');
        $this->addSql('DROP TABLE entity');
        $this->addSql('DROP TABLE module');
        $this->addSql('DROP TABLE hello_first');
    }
}
