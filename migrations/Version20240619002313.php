<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240619002313 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activity ADD destination_id INT NOT NULL');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095A816C6140 FOREIGN KEY (destination_id) REFERENCES destination (id)');
        $this->addSql('CREATE INDEX IDX_AC74095A816C6140 ON activity (destination_id)');
        $this->addSql('ALTER TABLE destination ADD booking_id INT NOT NULL');
        $this->addSql('ALTER TABLE destination ADD CONSTRAINT FK_3EC63EAA3301C60 FOREIGN KEY (booking_id) REFERENCES booking (id)');
        $this->addSql('CREATE INDEX IDX_3EC63EAA3301C60 ON destination (booking_id)');
        $this->addSql('ALTER TABLE hotel ADD destination_id INT NOT NULL');
        $this->addSql('ALTER TABLE hotel ADD CONSTRAINT FK_3535ED9816C6140 FOREIGN KEY (destination_id) REFERENCES destination (id)');
        $this->addSql('CREATE INDEX IDX_3535ED9816C6140 ON hotel (destination_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095A816C6140');
        $this->addSql('DROP INDEX IDX_AC74095A816C6140 ON activity');
        $this->addSql('ALTER TABLE activity DROP destination_id');
        $this->addSql('ALTER TABLE destination DROP FOREIGN KEY FK_3EC63EAA3301C60');
        $this->addSql('DROP INDEX IDX_3EC63EAA3301C60 ON destination');
        $this->addSql('ALTER TABLE destination DROP booking_id');
        $this->addSql('ALTER TABLE hotel DROP FOREIGN KEY FK_3535ED9816C6140');
        $this->addSql('DROP INDEX IDX_3535ED9816C6140 ON hotel');
        $this->addSql('ALTER TABLE hotel DROP destination_id');
    }
}
