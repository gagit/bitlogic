<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230430232619 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categoria (id UUID NOT NULL, nombre VARCHAR(100) NOT NULL, descripcion VARCHAR(200) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN categoria.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE marca (id UUID NOT NULL, nombre VARCHAR(100) NOT NULL, descripcion VARCHAR(200) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN marca.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE producto (id UUID NOT NULL, marca UUID DEFAULT NULL, unidad_medida UUID DEFAULT NULL, cod_barra VARCHAR(100) DEFAULT NULL, nombre VARCHAR(100) NOT NULL, descripcion VARCHAR(200) DEFAULT NULL, valor_umed NUMERIC(10, 0) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A7BB061570A0113 ON producto (marca)');
        $this->addSql('CREATE INDEX IDX_A7BB06157DA31363 ON producto (unidad_medida)');
        $this->addSql('COMMENT ON COLUMN producto.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN producto.marca IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN producto.unidad_medida IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE categoria_productos (id_producto UUID NOT NULL, id_categoria UUID NOT NULL, PRIMARY KEY(id_producto, id_categoria))');
        $this->addSql('CREATE INDEX IDX_6BF2EC63F760EA80 ON categoria_productos (id_producto)');
        $this->addSql('CREATE INDEX IDX_6BF2EC63CE25AE0A ON categoria_productos (id_categoria)');
        $this->addSql('COMMENT ON COLUMN categoria_productos.id_producto IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN categoria_productos.id_categoria IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE unidad_medida (id UUID NOT NULL, nombre VARCHAR(50) NOT NULL, nombre_corto VARCHAR(10) NOT NULL, dimension VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN unidad_medida.id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE producto ADD CONSTRAINT FK_A7BB061570A0113 FOREIGN KEY (marca) REFERENCES marca (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE producto ADD CONSTRAINT FK_A7BB06157DA31363 FOREIGN KEY (unidad_medida) REFERENCES unidad_medida (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE categoria_productos ADD CONSTRAINT FK_6BF2EC63F760EA80 FOREIGN KEY (id_producto) REFERENCES producto (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE categoria_productos ADD CONSTRAINT FK_6BF2EC63CE25AE0A FOREIGN KEY (id_categoria) REFERENCES categoria (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE producto DROP CONSTRAINT FK_A7BB061570A0113');
        $this->addSql('ALTER TABLE producto DROP CONSTRAINT FK_A7BB06157DA31363');
        $this->addSql('ALTER TABLE categoria_productos DROP CONSTRAINT FK_6BF2EC63F760EA80');
        $this->addSql('ALTER TABLE categoria_productos DROP CONSTRAINT FK_6BF2EC63CE25AE0A');
        $this->addSql('DROP TABLE categoria');
        $this->addSql('DROP TABLE marca');
        $this->addSql('DROP TABLE producto');
        $this->addSql('DROP TABLE categoria_productos');
        $this->addSql('DROP TABLE unidad_medida');
    }
}
