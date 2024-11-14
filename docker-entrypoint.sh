#!/bin/bash
#set -e

# Exibir cada comando antes de executá-lo (para depuração)
#set -x

# Instalar as dependências do Composer
#echo "Instalando dependências com Composer..."
#composer install --no-interaction --prefer-dist --optimize-autoloader

# Limpar e recarregar o cache de configuração antes de qualquer outra coisa
php artisan config:clear
php artisan config:cache

# Executar as migrações
echo "Running migrations..."
php artisan migrate --force

# Executar os seeders
echo "Running seeders..."
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=DadosExcepcionaisSeeder



echo "Starting Clear Caches..."
php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan route:cache
php artisan clear-compiled
php artisan optimize

# Iniciar o Apache
echo "Starting Apache..."
apache2-foreground
