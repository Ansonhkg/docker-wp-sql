FROM nginx:latest

RUN apt-get update && apt-get install openssl

# RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /data/certs/example.key -out /data/certs/example.crt -subj "/CN=localhost"

ADD default.conf /etc/nginx/conf.d/default.conf