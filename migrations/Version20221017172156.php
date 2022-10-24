<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221017172156 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE measurements (id INT AUTO_INCREMENT NOT NULL, place_id_id INT NOT NULL, date DATE NOT NULL, temperature NUMERIC(3, 0) NOT NULL, atmosferic_pressure VARCHAR(7) NOT NULL, rain_drop NUMERIC(10, 0) NOT NULL, INDEX IDX_71920F21D6328574 (place_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE measurements ADD CONSTRAINT FK_71920F21D6328574 FOREIGN KEY (place_id_id) REFERENCES location (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE measurements DROP FOREIGN KEY FK_71920F21D6328574');
        $this->addSql('DROP TABLE measurements');
    }
}
