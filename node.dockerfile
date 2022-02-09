FROM node:16.13.2

WORKDIR /srv/www/api

COPY ["./www/package.json", "./"]
COPY ["./www/package-lock.json", "./"]

RUN npm install --production
RUN npm install -g sass

CMD ["npm", "prod"]