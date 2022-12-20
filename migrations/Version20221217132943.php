<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221217132943 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client ADD legal_person BIT NOT NULL DEFAULT 0');
        $this->addSql('ALTER TABLE client ADD gender NVARCHAR(255)');
        $this->addSql('ALTER TABLE client DROP CONSTRAINT DF_C7440455_50F9BB84');
        $this->addSql('ALTER TABLE client ALTER COLUMN enabled BIT NOT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT DF_C7440455_50F9BB84 DEFAULT 0 FOR enabled');
        $this->addSql('ALTER TABLE contact_type DROP CONSTRAINT DF_A421D5D6_50F9BB84');
        $this->addSql('ALTER TABLE contact_type ALTER COLUMN enabled BIT NOT NULL');
        $this->addSql('ALTER TABLE contact_type ADD CONSTRAINT DF_A421D5D6_50F9BB84 DEFAULT 0 FOR enabled');
        $this->addSql('ALTER TABLE identification_type DROP CONSTRAINT DF_654BB9FD_50F9BB84');
        $this->addSql('ALTER TABLE identification_type ALTER COLUMN enabled BIT');
        $this->addSql('ALTER TABLE identification_type ADD CONSTRAINT DF_654BB9FD_50F9BB84 DEFAULT 0 FOR enabled');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP COLUMN legal_person');
        $this->addSql('ALTER TABLE client DROP COLUMN gender');
        $this->addSql('ALTER TABLE client DROP CONSTRAINT DF_C7440455_50F9BB84');
        $this->addSql('ALTER TABLE client ALTER COLUMN enabled BIT NOT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT DF_C7440455_50F9BB84 DEFAULT 0 FOR enabled');
        $this->addSql('ALTER TABLE contact_type DROP CONSTRAINT DF_A421D5D6_50F9BB84');
        $this->addSql('ALTER TABLE contact_type ALTER COLUMN enabled BIT NOT NULL');
        $this->addSql('ALTER TABLE contact_type ADD CONSTRAINT DF_A421D5D6_50F9BB84 DEFAULT 0 FOR enabled');
        $this->addSql('ALTER TABLE identification_type DROP CONSTRAINT DF_654BB9FD_50F9BB84');
        $this->addSql('ALTER TABLE identification_type ALTER COLUMN enabled BIT');
        $this->addSql('ALTER TABLE identification_type ADD CONSTRAINT DF_654BB9FD_50F9BB84 DEFAULT 0 FOR enabled');
    }
}
