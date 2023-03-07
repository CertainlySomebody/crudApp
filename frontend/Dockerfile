FROM node:lts-alpine

RUN npm install -g http-server

WORKDIR /var/www/crud-frontend/frontend

COPY package.json ./

RUN npm install

COPY .. .

RUN npm run build

EXPOSE 1010

CMD [ "http-server", "dist" ]
