# Используем официальный образ PHP с Apache
FROM php:8.1-apache

# Устанавливаем необходимые расширения
RUN docker-php-ext-install mysqli

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Копируем все файлы проекта в контейнер
COPY . /var/www/html

# Открываем порт 80 для доступа через браузер
EXPOSE 80
