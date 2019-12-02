<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191201172452 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE slave_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE master_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE contract_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE slave (id INT NOT NULL, name VARCHAR(255) NOT NULL, gender INT NOT NULL, price INT NOT NULL, price_hourly_lease INT NOT NULL, age INT NOT NULL, weight INT NOT NULL, color VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE master (id INT NOT NULL, name VARCHAR(255) NOT NULL, is_vip BOOLEAN DEFAULT \'false\' NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE contract (id INT NOT NULL, slave_id INT DEFAULT NULL, master_id INT DEFAULT NULL, start_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, end_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E98F28592B29BD08 ON contract (slave_id)');
        $this->addSql('CREATE INDEX IDX_E98F285913B3DB11 ON contract (master_id)');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT FK_E98F28592B29BD08 FOREIGN KEY (slave_id) REFERENCES slave (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contract ADD CONSTRAINT FK_E98F285913B3DB11 FOREIGN KEY (master_id) REFERENCES master (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE contract DROP CONSTRAINT FK_E98F28592B29BD08');
        $this->addSql('ALTER TABLE contract DROP CONSTRAINT FK_E98F285913B3DB11');
        $this->addSql('DROP SEQUENCE slave_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE master_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE contract_id_seq CASCADE');
        $this->addSql('DROP TABLE slave');
        $this->addSql('DROP TABLE master');
        $this->addSql('DROP TABLE contract');
    }
}
