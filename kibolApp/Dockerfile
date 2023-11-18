# Użyj obrazu PHP
FROM php:8.1.16-fpm

# Instaluj dodatkowe narzędzia i rozszerzenia
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev

# Instaluj rozszerzenia PHP
RUN docker-php-ext-install pdo pdo_mysql zip

# Ustaw katalog roboczy
WORKDIR /app/backend

# Kopiuj pliki aplikacji
COPY . .

# Eksponuj port 8000
EXPOSE 8000
