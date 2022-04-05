<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220318143902 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE especialidade (id INT AUTO_INCREMENT NOT NULL, descricao VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE profissional ADD especialidade_id INT NOT NULL');
        $this->addSql('ALTER TABLE profissional ADD CONSTRAINT FK_E41A66E53BA9BFA5 FOREIGN KEY (especialidade_id) REFERENCES especialidade (id)');
        $this->addSql('CREATE INDEX IDX_E41A66E53BA9BFA5 ON profissional (especialidade_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profissional DROP FOREIGN KEY FK_E41A66E53BA9BFA5');
        $this->addSql('DROP TABLE especialidade');
        $this->addSql('DROP INDEX IDX_E41A66E53BA9BFA5 ON profissional');
        $this->addSql('ALTER TABLE profissional DROP especialidade_id, CHANGE nome nome VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
