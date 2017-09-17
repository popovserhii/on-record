<?php

namespace DoctrineORMModule\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170917133331 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE file (id INT UNSIGNED AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, itemId INT NOT NULL, createdAt DATETIME DEFAULT NULL, entityId INT UNSIGNED DEFAULT NULL, createdBy INT UNSIGNED DEFAULT NULL, INDEX IDX_8C9F3610F62829FC (entityId), INDEX IDX_8C9F3610D3564642 (createdBy), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F3610F62829FC FOREIGN KEY (entityId) REFERENCES entity (id)');
        $this->addSql('ALTER TABLE file ADD CONSTRAINT FK_8C9F3610D3564642 FOREIGN KEY (createdBy) REFERENCES user (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE file');
    }
}
