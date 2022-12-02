<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221202173059 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id UNIQUEIDENTIFIER NOT NULL, name NVARCHAR(255) NOT NULL, last_name NVARCHAR(255), address VARCHAR(MAX), date_creation DATE, enabled BIT NOT NULL, PRIMARY KEY (id))');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:uuid)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'client\', N\'COLUMN\', id');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT DF_C7440455_50F9BB84 DEFAULT 0 FOR enabled');
        $this->addSql('CREATE TABLE contact_client (id UNIQUEIDENTIFIER NOT NULL, contact_type_id UNIQUEIDENTIFIER, client_id UNIQUEIDENTIFIER, value NVARCHAR(255) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_57D633D45F63AD12 ON contact_client (contact_type_id)');
        $this->addSql('CREATE INDEX IDX_57D633D419EB6921 ON contact_client (client_id)');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:uuid)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'contact_client\', N\'COLUMN\', id');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:uuid)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'contact_client\', N\'COLUMN\', contact_type_id');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:uuid)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'contact_client\', N\'COLUMN\', client_id');
        $this->addSql('CREATE TABLE contact_type (id UNIQUEIDENTIFIER NOT NULL, name NVARCHAR(255) NOT NULL, description NVARCHAR(255), contact_group NVARCHAR(255), font_awesome_icon NVARCHAR(255), enabled BIT NOT NULL, PRIMARY KEY (id))');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:uuid)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'contact_type\', N\'COLUMN\', id');
        $this->addSql('ALTER TABLE contact_type ADD CONSTRAINT DF_A421D5D6_50F9BB84 DEFAULT 0 FOR enabled');
        $this->addSql('CREATE TABLE identification_client (id UNIQUEIDENTIFIER NOT NULL, identification_type_id UNIQUEIDENTIFIER NOT NULL, client_id UNIQUEIDENTIFIER, identification NVARCHAR(255) NOT NULL, PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_65A222A4F54A83F ON identification_client (identification_type_id)');
        $this->addSql('CREATE INDEX IDX_65A222A419EB6921 ON identification_client (client_id)');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:uuid)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'identification_client\', N\'COLUMN\', id');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:uuid)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'identification_client\', N\'COLUMN\', identification_type_id');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:uuid)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'identification_client\', N\'COLUMN\', client_id');
        $this->addSql('CREATE TABLE identification_type (id UNIQUEIDENTIFIER NOT NULL, name NVARCHAR(255) NOT NULL, description VARCHAR(MAX), enabled BIT, type_identification NVARCHAR(255), PRIMARY KEY (id))');
        $this->addSql('EXEC sp_addextendedproperty N\'MS_Description\', N\'(DC2Type:uuid)\', N\'SCHEMA\', \'dbo\', N\'TABLE\', \'identification_type\', N\'COLUMN\', id');
        $this->addSql('ALTER TABLE identification_type ADD CONSTRAINT DF_654BB9FD_50F9BB84 DEFAULT 0 FOR enabled');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT IDENTITY NOT NULL, body VARCHAR(MAX) NOT NULL, headers VARCHAR(MAX) NOT NULL, queue_name NVARCHAR(190) NOT NULL, created_at DATETIME2(6) NOT NULL, available_at DATETIME2(6) NOT NULL, delivered_at DATETIME2(6), PRIMARY KEY (id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('ALTER TABLE contact_client ADD CONSTRAINT FK_57D633D45F63AD12 FOREIGN KEY (contact_type_id) REFERENCES contact_type (id)');
        $this->addSql('ALTER TABLE contact_client ADD CONSTRAINT FK_57D633D419EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE identification_client ADD CONSTRAINT FK_65A222A4F54A83F FOREIGN KEY (identification_type_id) REFERENCES identification_type (id)');
        $this->addSql('ALTER TABLE identification_client ADD CONSTRAINT FK_65A222A419EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
//        $this->addSql('ALTER TABLE VTMCLH DROP COLUMN VTMCLH_DIFDES');
//        $this->addSql('ALTER TABLE VTMCLH DROP COLUMN VTMCLH_DIFHAS');
//        $this->addSql('ALTER TABLE VTMCLH DROP COLUMN VTMCLH_FECALT');
//        $this->addSql('ALTER TABLE VTMCLH DROP COLUMN VTMCLH_FECMOD');
//        $this->addSql('ALTER TABLE VTMCLH DROP COLUMN VTMCLH_TSTAMP');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA db_accessadmin');
        $this->addSql('CREATE SCHEMA db_backupoperator');
        $this->addSql('CREATE SCHEMA db_datareader');
        $this->addSql('CREATE SCHEMA db_datawriter');
        $this->addSql('CREATE SCHEMA db_ddladmin');
        $this->addSql('CREATE SCHEMA db_denydatareader');
        $this->addSql('CREATE SCHEMA db_denydatawriter');
        $this->addSql('CREATE SCHEMA db_owner');
        $this->addSql('CREATE SCHEMA db_securityadmin');
        $this->addSql('CREATE SCHEMA dbo');
        $this->addSql('ALTER TABLE contact_client DROP CONSTRAINT FK_57D633D45F63AD12');
        $this->addSql('ALTER TABLE contact_client DROP CONSTRAINT FK_57D633D419EB6921');
        $this->addSql('ALTER TABLE identification_client DROP CONSTRAINT FK_65A222A4F54A83F');
        $this->addSql('ALTER TABLE identification_client DROP CONSTRAINT FK_65A222A419EB6921');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE contact_client');
        $this->addSql('DROP TABLE contact_type');
        $this->addSql('DROP TABLE identification_client');
        $this->addSql('DROP TABLE identification_type');
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE VTMCLH ADD VTMCLH_DIFDES DATETIME2(6)');
        $this->addSql('ALTER TABLE VTMCLH ADD VTMCLH_DIFHAS DATETIME2(6)');
        $this->addSql('ALTER TABLE VTMCLH ADD VTMCLH_FECALT DATETIME2(6)');
        $this->addSql('ALTER TABLE VTMCLH ADD VTMCLH_FECMOD DATETIME2(6)');
        $this->addSql('ALTER TABLE VTMCLH ADD VTMCLH_TSTAMP DATETIME2(6)');
    }
}
