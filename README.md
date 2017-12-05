# CMS Projekt - Konferencje

## Wymagane oprogramowanie
* GIT
* Docker
* Docker compose

## Wykorzystane obrazy
* php z zainstalowanymi pdo i mysqli - na porcie 80
* mysql - na porcie 3306
* phpmyadmin - na porcie 8080

## Uruchamianie
1. Uruchom terminal
2. Przejdź do katalogu z projektem
3. Wpisz `docker build -t cms .`
4. Wpisz `docker-compose up -d`

## Wyłączanie
1. Wpisz `docker-compose down`
