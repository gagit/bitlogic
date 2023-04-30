<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230412231322 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id UUID NOT NULL, name VARCHAR(255) NOT NULL, last_name VARCHAR(255) DEFAULT NULL, address TEXT DEFAULT NULL, date_creation DATE DEFAULT NULL, enabled BOOLEAN DEFAULT false NOT NULL, legal_person BOOLEAN NOT NULL, gender VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN client.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE client_tramasica (id UUID NOT NULL, client_id UUID DEFAULT NULL, time_of_bird TIME(0) WITHOUT TIME ZONE DEFAULT NULL, address_of_bird VARCHAR(255) DEFAULT NULL, lat_address_of_bird DOUBLE PRECISION DEFAULT NULL, lng_address_of_bird DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_390353CA19EB6921 ON client_tramasica (client_id)');
        $this->addSql('COMMENT ON COLUMN client_tramasica.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN client_tramasica.client_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE contact_client (id UUID NOT NULL, contact_type_id UUID DEFAULT NULL, client_id UUID DEFAULT NULL, value VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_57D633D45F63AD12 ON contact_client (contact_type_id)');
        $this->addSql('CREATE INDEX IDX_57D633D419EB6921 ON contact_client (client_id)');
        $this->addSql('COMMENT ON COLUMN contact_client.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN contact_client.contact_type_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN contact_client.client_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE contact_type (id UUID NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, contact_group VARCHAR(255) DEFAULT NULL, font_awesome_icon VARCHAR(255) DEFAULT NULL, enabled BOOLEAN DEFAULT false NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN contact_type.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE identification_client (id UUID NOT NULL, identification_type_id UUID NOT NULL, client_id UUID DEFAULT NULL, identification VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_65A222A4F54A83F ON identification_client (identification_type_id)');
        $this->addSql('CREATE INDEX IDX_65A222A419EB6921 ON identification_client (client_id)');
        $this->addSql('COMMENT ON COLUMN identification_client.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN identification_client.identification_type_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN identification_client.client_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE identification_type (id UUID NOT NULL, name VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, enabled BOOLEAN DEFAULT false, type_identification VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN identification_type.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE client_tramasica ADD CONSTRAINT FK_390353CA19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contact_client ADD CONSTRAINT FK_57D633D45F63AD12 FOREIGN KEY (contact_type_id) REFERENCES contact_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contact_client ADD CONSTRAINT FK_57D633D419EB6921 FOREIGN KEY (client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE identification_client ADD CONSTRAINT FK_65A222A4F54A83F FOREIGN KEY (identification_type_id) REFERENCES identification_type (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE identification_client ADD CONSTRAINT FK_65A222A419EB6921 FOREIGN KEY (client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE client_tramasica DROP CONSTRAINT FK_390353CA19EB6921');
        $this->addSql('ALTER TABLE contact_client DROP CONSTRAINT FK_57D633D45F63AD12');
        $this->addSql('ALTER TABLE contact_client DROP CONSTRAINT FK_57D633D419EB6921');
        $this->addSql('ALTER TABLE identification_client DROP CONSTRAINT FK_65A222A4F54A83F');
        $this->addSql('ALTER TABLE identification_client DROP CONSTRAINT FK_65A222A419EB6921');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE client_tramasica');
        $this->addSql('DROP TABLE contact_client');
        $this->addSql('DROP TABLE contact_type');
        $this->addSql('DROP TABLE identification_client');
        $this->addSql('DROP TABLE identification_type');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
