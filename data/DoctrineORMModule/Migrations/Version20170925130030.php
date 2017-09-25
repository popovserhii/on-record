<?php

namespace DoctrineORMModule\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170925130030 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE mail (id INT UNSIGNED AUTO_INCREMENT NOT NULL, theme VARCHAR(255) NOT NULL, body LONGTEXT NOT NULL, hidden VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, statusId INT UNSIGNED NOT NULL, info LONGTEXT NOT NULL, lastDateCron DATE DEFAULT NULL, entiyId INT UNSIGNED DEFAULT NULL, INDEX IDX_5126AC48C242E42 (entiyId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_option (id INT UNSIGNED AUTO_INCREMENT NOT NULL, period INT NOT NULL, emailTo VARCHAR(255) NOT NULL, mailId INT UNSIGNED NOT NULL, step INT NOT NULL, INDEX IDX_87BFBFDBCD7D381A (mailId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_option_role (id INT UNSIGNED AUTO_INCREMENT NOT NULL, roleId INT UNSIGNED NOT NULL, mailId INT UNSIGNED NOT NULL, cityCreator VARCHAR(255) NOT NULL, byBrand VARCHAR(255) NOT NULL, cityIn VARCHAR(255) NOT NULL, INDEX IDX_BB85D54CD7D381A (mailId), INDEX IDX_BB85D54B8C2FD88 (roleId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mail_role (id INT UNSIGNED AUTO_INCREMENT NOT NULL, mailId INT UNSIGNED DEFAULT NULL, roleId INT UNSIGNED DEFAULT NULL, INDEX IDX_FA121903CD7D381A (mailId), INDEX IDX_FA121903B8C2FD88 (roleId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE mail ADD CONSTRAINT FK_5126AC48C242E42 FOREIGN KEY (entiyId) REFERENCES entity (id)');
        $this->addSql('ALTER TABLE mail_option ADD CONSTRAINT FK_87BFBFDBCD7D381A FOREIGN KEY (mailId) REFERENCES mail (id)');
        $this->addSql('ALTER TABLE mail_option_role ADD CONSTRAINT FK_BB85D54CD7D381A FOREIGN KEY (mailId) REFERENCES mail (id)');
        $this->addSql('ALTER TABLE mail_option_role ADD CONSTRAINT FK_BB85D54B8C2FD88 FOREIGN KEY (roleId) REFERENCES role (id)');
        $this->addSql('ALTER TABLE mail_role ADD CONSTRAINT FK_FA121903CD7D381A FOREIGN KEY (mailId) REFERENCES mail (id)');
        $this->addSql('ALTER TABLE mail_role ADD CONSTRAINT FK_FA121903B8C2FD88 FOREIGN KEY (roleId) REFERENCES role (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE mail_option DROP FOREIGN KEY FK_87BFBFDBCD7D381A');
        $this->addSql('ALTER TABLE mail_option_role DROP FOREIGN KEY FK_BB85D54CD7D381A');
        $this->addSql('ALTER TABLE mail_role DROP FOREIGN KEY FK_FA121903CD7D381A');
        $this->addSql('DROP TABLE mail');
        $this->addSql('DROP TABLE mail_option');
        $this->addSql('DROP TABLE mail_option_role');
        $this->addSql('DROP TABLE mail_role');
    }
}
