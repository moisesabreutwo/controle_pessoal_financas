FROM php:8.2-apache

# Instalar as extensões e ferramentas necessárias
RUN apt-get update && \
    apt-get install -y \
    mariadb-client \
    libzip-dev \
    zip \
    unzip \
    git \
    libonig-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql mbstring 


# Habilitar mod_rewrite do Apache
RUN a2enmod rewrite

# Define o diretório de trabalho
WORKDIR /var/www/html

# Copia o composer.lock e o composer.json
COPY composer.lock composer.json ./

# Instala o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --no-scripts --no-progress --prefer-dist


# Copiar os arquivos do projeto para o container
COPY . /var/www/html

# Definir permissões corretas para as pastas storage e public/storage
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/public /var/www/html/storage/logs \
    && chmod -R 777 /var/www/html/storage /var/www/html/public /var/www/html/storage/logs

# Configurar o Apache para servir a pasta public do Laravel
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Definir o script de entrada, se existir
COPY docker-entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/docker-entrypoint.sh
ENTRYPOINT ["docker-entrypoint.sh"]


# No Dockerfile
# Copia o script para o container
COPY docker-wait-for-it.sh /docker-wait-for-it.sh

# Torna o script executável
RUN chmod +x /docker-wait-for-it.sh


# Exponha a porta 80
EXPOSE 80
