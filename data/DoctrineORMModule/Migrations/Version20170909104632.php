<?php

namespace DoctrineORMModule\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170909104632 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE inquiry (id INT UNSIGNED AUTO_INCREMENT NOT NULL, createdAt DATETIME NOT NULL, firstName VARCHAR(255) NOT NULL, lastName VARCHAR(255) DEFAULT \'\', gender VARCHAR(255) DEFAULT \'\', maritalStatus VARCHAR(255) DEFAULT \'\', idCard INT DEFAULT NULL, passportCode VARCHAR(255) DEFAULT NULL, passportNumber INT DEFAULT NULL, passportIssued VARCHAR(255) DEFAULT \'\', birthedAt DATETIME DEFAULT NULL, birthedIn VARCHAR(255) DEFAULT \'\', nationality VARCHAR(255) DEFAULT \'\', phone INT NOT NULL, email VARCHAR(255) DEFAULT NULL, street VARCHAR(255) DEFAULT \'\', city VARCHAR(255) DEFAULT \'\', municipality VARCHAR(255) DEFAULT \'\', postCode VARCHAR(255) DEFAULT \'\', secondaryEducation VARCHAR(255) DEFAULT \'\', secondarySchoolName VARCHAR(255) DEFAULT \'\', typeOfEducation VARCHAR(255) DEFAULT \'\', secondaryYearOfGraduation VARCHAR(255) DEFAULT \'\', schoolAddress VARCHAR(255) DEFAULT \'\', schoolWebsite VARCHAR(255) DEFAULT \'\', tertiaryEducation VARCHAR(255) DEFAULT \'\', universityName VARCHAR(255) DEFAULT \'\', levelOfStudy VARCHAR(255) DEFAULT \'\', programmeOfStudy VARCHAR(255) DEFAULT \'\', honorsAndDistinctions VARCHAR(255) DEFAULT \'\', schoolActivities VARCHAR(255) DEFAULT \'\', communityService VARCHAR(255) DEFAULT \'\', otherActivities VARCHAR(255) DEFAULT \'\', employment VARCHAR(255) DEFAULT \'\', academicAreasOfInterest VARCHAR(255) DEFAULT \'\', countriesInterestedForStudies VARCHAR(255) DEFAULT \'\', comment VARCHAR(255) DEFAULT \'\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE inquiry');
    }
}
