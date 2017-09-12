<?php

namespace DoctrineORMModule\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170909191900 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE student_guardian (id INT UNSIGNED AUTO_INCREMENT NOT NULL, createdAt DATETIME NOT NULL, fullName VARCHAR(255) DEFAULT \'\' NOT NULL, phone VARCHAR(11) DEFAULT NULL, email VARCHAR(255) DEFAULT \'\', profession VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE hello_first CHANGE phone phone VARCHAR(11) NOT NULL');
        $this->addSql('ALTER TABLE inquiry ADD guardianId INT UNSIGNED DEFAULT NULL, CHANGE phone phone VARCHAR(11) NOT NULL');
        $this->addSql('ALTER TABLE inquiry ADD CONSTRAINT FK_5A3903F0A0C3EFF3 FOREIGN KEY (guardianId) REFERENCES student_guardian (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5A3903F0A0C3EFF3 ON inquiry (guardianId)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE inquiry DROP FOREIGN KEY FK_5A3903F0A0C3EFF3');
        $this->addSql('DROP TABLE student_guardian');
        $this->addSql('ALTER TABLE hello_first CHANGE phone phone INT NOT NULL');
        $this->addSql('DROP INDEX UNIQ_5A3903F0A0C3EFF3 ON inquiry');
        $this->addSql('ALTER TABLE inquiry DROP guardianId, CHANGE phone phone VARCHAR(13) NOT NULL COLLATE utf8_unicode_ci');
    }
}
