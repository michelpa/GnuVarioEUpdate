<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200227162301 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE vario_fichier (id INT AUTO_INCREMENT NOT NULL, created DATETIME DEFAULT NULL, updated DATETIME DEFAULT NULL, libelle VARCHAR(255) NOT NULL, filename VARCHAR(1024) DEFAULT NULL, description LONGTEXT DEFAULT NULL, is_active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vario_version_download_log (id INT AUTO_INCREMENT NOT NULL, vario_version_id INT DEFAULT NULL, created DATETIME DEFAULT NULL, updated DATETIME DEFAULT NULL, uid VARCHAR(255) NOT NULL, INDEX IDX_F0BA85F8583D15 (vario_version_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vario_version_download_log ADD CONSTRAINT FK_F0BA85F8583D15 FOREIGN KEY (vario_version_id) REFERENCES vario_version (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE vario_fichier');
        $this->addSql('DROP TABLE vario_version_download_log');
    }
}
