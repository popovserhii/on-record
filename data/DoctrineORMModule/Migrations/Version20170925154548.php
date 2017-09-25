<?php

namespace DoctrineORMModule\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170925154548 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE mail DROP FOREIGN KEY FK_5126AC48C242E42');
        $this->addSql('DROP INDEX IDX_5126AC48C242E42 ON mail');
        $this->addSql('ALTER TABLE mail DROP entiyId, CHANGE mnemo action VARCHAR(32) NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE mail ADD entiyId INT UNSIGNED DEFAULT NULL, CHANGE action mnemo VARCHAR(32) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE mail ADD CONSTRAINT FK_5126AC48C242E42 FOREIGN KEY (entiyId) REFERENCES entity (id)');
        $this->addSql('CREATE INDEX IDX_5126AC48C242E42 ON mail (entiyId)');
    }
}
