<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180414084623 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            $this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.'
        );

        $this->addSql('CREATE TABLE invitation (id INT AUTO_INCREMENT NOT NULL, user_sender_id INT DEFAULT NULL, user_receiver_id INT DEFAULT NULL, status VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE invitation ADD CONSTRAINT FK_F11D61A2F6C43E79 FOREIGN KEY (user_sender_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE invitation ADD CONSTRAINT FK_F11D61A264482423 FOREIGN KEY (user_receiver_id) REFERENCES user (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            $this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.'
        );

        $this->addSql('DROP TABLE invitation');
    }
}
