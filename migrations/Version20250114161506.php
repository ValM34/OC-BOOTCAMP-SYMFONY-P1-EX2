<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250114161506 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employe_projet (employe_id INT NOT NULL, projet_id INT NOT NULL, PRIMARY KEY(employe_id, projet_id))');
        $this->addSql('CREATE INDEX IDX_3E3387501B65292 ON employe_projet (employe_id)');
        $this->addSql('CREATE INDEX IDX_3E338750C18272 ON employe_projet (projet_id)');
        $this->addSql('ALTER TABLE employe_projet ADD CONSTRAINT FK_3E3387501B65292 FOREIGN KEY (employe_id) REFERENCES employe (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE employe_projet ADD CONSTRAINT FK_3E338750C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE projet_employe DROP CONSTRAINT fk_7a2e8ec8c18272');
        $this->addSql('ALTER TABLE projet_employe DROP CONSTRAINT fk_7a2e8ec81b65292');
        $this->addSql('DROP TABLE projet_employe');
        $this->addSql('ALTER TABLE employe ADD roles JSON NOT NULL');
        $this->addSql('ALTER TABLE employe ADD password VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE employe ALTER nom SET NOT NULL');
        $this->addSql('ALTER TABLE employe ALTER prenom SET NOT NULL');
        $this->addSql('ALTER TABLE employe ALTER email TYPE VARCHAR(180)');
        $this->addSql('ALTER TABLE employe ALTER statut SET NOT NULL');
        $this->addSql('ALTER TABLE employe ALTER date_arrivee TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE employe ALTER date_arrivee SET NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL ON employe (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE projet_employe (projet_id INT NOT NULL, employe_id INT NOT NULL, PRIMARY KEY(projet_id, employe_id))');
        $this->addSql('CREATE INDEX idx_7a2e8ec81b65292 ON projet_employe (employe_id)');
        $this->addSql('CREATE INDEX idx_7a2e8ec8c18272 ON projet_employe (projet_id)');
        $this->addSql('ALTER TABLE projet_employe ADD CONSTRAINT fk_7a2e8ec8c18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE projet_employe ADD CONSTRAINT fk_7a2e8ec81b65292 FOREIGN KEY (employe_id) REFERENCES employe (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE employe_projet DROP CONSTRAINT FK_3E3387501B65292');
        $this->addSql('ALTER TABLE employe_projet DROP CONSTRAINT FK_3E338750C18272');
        $this->addSql('DROP TABLE employe_projet');
        $this->addSql('DROP INDEX UNIQ_IDENTIFIER_EMAIL');
        $this->addSql('ALTER TABLE employe DROP roles');
        $this->addSql('ALTER TABLE employe DROP password');
        $this->addSql('ALTER TABLE employe ALTER email TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE employe ALTER nom DROP NOT NULL');
        $this->addSql('ALTER TABLE employe ALTER prenom DROP NOT NULL');
        $this->addSql('ALTER TABLE employe ALTER statut DROP NOT NULL');
        $this->addSql('ALTER TABLE employe ALTER date_arrivee TYPE DATE');
        $this->addSql('ALTER TABLE employe ALTER date_arrivee DROP NOT NULL');
    }
}
