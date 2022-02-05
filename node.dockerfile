FROM node:16.13.2

WORKDIR /srv/www/api

COPY ["./www/package.json", "./"]

RUN npm install --production