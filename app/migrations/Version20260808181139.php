<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260808181139 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('DROP TABLE tsp');

        $this->addSql('CREATE TABLE tsp (
        id INT AUTO_INCREMENT NOT NULL,
        first_name VARCHAR(255) NOT NULL,
        last_name VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');

        // Données initiales
        $this->addSql("
        INSERT INTO tsp (first_name, last_name)
        VALUES
            ('Florian', 'Ferak'),
            ('Vincent', 'Lacour'),
            ('Olivier', 'Durand')
    ");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE tsp');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
