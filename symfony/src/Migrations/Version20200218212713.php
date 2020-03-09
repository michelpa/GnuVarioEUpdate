<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200218212713 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE vario_version (id INT AUTO_INCREMENT NOT NULL, firmware_type VARCHAR(255) NOT NULL, version INT NOT NULL, subversion INT NOT NULL, betaversion INT NOT NULL, bin VARCHAR(1024) NOT NULL, www1 VARCHAR(1024) DEFAULT NULL, www2 VARCHAR(1024) DEFAULT NULL, www3 VARCHAR(1024) DEFAULT NULL, www4 VARCHAR(1024) DEFAULT NULL, www5 VARCHAR(1024) DEFAULT NULL, www6 VARCHAR(1024) DEFAULT NULL, www7 VARCHAR(1024) DEFAULT NULL, www8 VARCHAR(1024) DEFAULT NULL, www9 VARCHAR(1024) DEFAULT NULL, www10 VARCHAR(1024) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE vario_version');
    }
}
