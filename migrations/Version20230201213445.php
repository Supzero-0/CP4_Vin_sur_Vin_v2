<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230201213445 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C64687CDE30DD');
        $this->addSql('DROP INDEX IDX_560C64687CDE30DD ON wine');
        $this->addSql('ALTER TABLE wine DROP appellation_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wine ADD appellation_id INT NOT NULL');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C64687CDE30DD FOREIGN KEY (appellation_id) REFERENCES appellation (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_560C64687CDE30DD ON wine (appellation_id)');
    }
}
