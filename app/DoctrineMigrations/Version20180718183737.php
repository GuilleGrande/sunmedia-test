<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180718183737 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE component_creative (component_id INT NOT NULL, creative_id INT NOT NULL, INDEX IDX_193E6109E2ABAFFF (component_id), INDEX IDX_193E61098E0ED468 (creative_id), PRIMARY KEY(component_id, creative_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE component_creative ADD CONSTRAINT FK_193E6109E2ABAFFF FOREIGN KEY (component_id) REFERENCES components (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE component_creative ADD CONSTRAINT FK_193E61098E0ED468 FOREIGN KEY (creative_id) REFERENCES creatives (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE component_creative');
    }
}
