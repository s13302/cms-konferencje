#!/bin/bash

docker stop my-apache-app
docker rm my-apache-app
#docker run -dit --name my-apache-app -p 80:80 -v "$PWD":/usr/local/apache2/htdocs/ httpd:2.4
docker run -dit --name my-apache-app -p 80:80 -v "$PWD/src":/var/www/html/ cms
