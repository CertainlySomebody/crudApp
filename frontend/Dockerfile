FROM node:lts-alpine

WORKDIR /var/www/crud-frontend/frontend

COPY package*.json ./
RUN npm install

COPY . .

EXPOSE 3000

RUN npm run generate