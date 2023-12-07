<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231207111831 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cadeaux ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cadeaux ADD CONSTRAINT FK_C15356EFA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_C15356EFA76ED395 ON cadeaux (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cadeaux DROP FOREIGN KEY FK_C15356EFA76ED395');
        $this->addSql('DROP INDEX IDX_C15356EFA76ED395 ON cadeaux');
        $this->addSql('ALTER TABLE cadeaux DROP user_id');
    }
}
