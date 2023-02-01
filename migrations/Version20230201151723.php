<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230201151723 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE appellation (id INT AUTO_INCREMENT NOT NULL, vineyard_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_187A5B98484674D1 (vineyard_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vineyard (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appellation ADD CONSTRAINT FK_187A5B98484674D1 FOREIGN KEY (vineyard_id) REFERENCES vineyard (id)');
        $this->addSql('ALTER TABLE wine ADD vineyard_id INT NOT NULL');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C6468484674D1 FOREIGN KEY (vineyard_id) REFERENCES vineyard (id)');
        $this->addSql('CREATE INDEX IDX_560C6468484674D1 ON wine (vineyard_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C6468484674D1');
        $this->addSql('ALTER TABLE appellation DROP FOREIGN KEY FK_187A5B98484674D1');
        $this->addSql('DROP TABLE appellation');
        $this->addSql('DROP TABLE vineyard');
        $this->addSql('DROP INDEX IDX_560C6468484674D1 ON wine');
        $this->addSql('ALTER TABLE wine DROP vineyard_id');
    }
}
