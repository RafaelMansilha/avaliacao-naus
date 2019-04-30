<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190430205354 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE produto (id INT AUTO_INCREMENT NOT NULL, descricao VARCHAR(255) NOT NULL, preco DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE solicitacao (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE solicitacao_produto (id INT AUTO_INCREMENT NOT NULL, produto_id INT NOT NULL, solicitacao_id INT NOT NULL, quantidade INT NOT NULL, INDEX IDX_939EF189105CFD56 (produto_id), INDEX IDX_939EF189774BE1CF (solicitacao_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE solicitacao_produto ADD CONSTRAINT FK_939EF189105CFD56 FOREIGN KEY (produto_id) REFERENCES produto (id)');
        $this->addSql('ALTER TABLE solicitacao_produto ADD CONSTRAINT FK_939EF189774BE1CF FOREIGN KEY (solicitacao_id) REFERENCES solicitacao (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE solicitacao_produto DROP FOREIGN KEY FK_939EF189105CFD56');
        $this->addSql('ALTER TABLE solicitacao_produto DROP FOREIGN KEY FK_939EF189774BE1CF');
        $this->addSql('DROP TABLE produto');
        $this->addSql('DROP TABLE solicitacao');
        $this->addSql('DROP TABLE solicitacao_produto');
    }
}
