# Vox-Teste

Como executar?

cd /api

sudo docker-compose up -d

sudo docker-compose exec php composer install

sudo docker-compose exec php php bin/console doctrine:migrations:migrate

