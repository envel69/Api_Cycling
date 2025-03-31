<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250310150550 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE controls (id SERIAL NOT NULL, date VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE race (id SERIAL NOT NULL, country VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, id_stage VARCHAR(255) NOT NULL, teams VARCHAR(255) NOT NULL, id_country VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE ranking (id SERIAL NOT NULL, position VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE stage (id SERIAL NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, id_controls BIGINT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE team (id SERIAL NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE controls');
        $this->addSql('DROP TABLE custom_media');
        $this->addSql('DROP TABLE race');
        $this->addSql('DROP TABLE ranking');
        $this->addSql('DROP TABLE stage');
        $this->addSql('DROP TABLE team');
    }
}
