<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180716152617 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE components ADD image_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE components ADD CONSTRAINT FK_EE48F5FD3DA5256D FOREIGN KEY (image_id) REFERENCES images (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EE48F5FD3DA5256D ON components (image_id)');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6AE2ABAFFF');
        $this->addSql('DROP INDEX IDX_E01FBE6AE2ABAFFF ON images');
        $this->addSql('ALTER TABLE images DROP component_id');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE components DROP FOREIGN KEY FK_EE48F5FD3DA5256D');
        $this->addSql('DROP INDEX UNIQ_EE48F5FD3DA5256D ON components');
        $this->addSql('ALTER TABLE components DROP image_id');
        $this->addSql('ALTER TABLE images ADD component_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6AE2ABAFFF FOREIGN KEY (component_id) REFERENCES components (id)');
        $this->addSql('CREATE INDEX IDX_E01FBE6AE2ABAFFF ON images (component_id)');
    }
}
