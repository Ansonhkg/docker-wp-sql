FROM nginx:latest

RUN apt-get update && apt-get install openssl

# Self-Assigned SSL for localhost
# RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /data/certs/example.key -out /data/certs/example.crt -subj "/CN=localhost"

# Your fully qualified domain name or IP address
# ADD certs/api.checkoutafrica.com/ca.cert /data/certs/ca.cert
# ADD certs/api.checkoutafrica.com/ca.key /data/certs/ca.key
# ADD certs/api.checkoutafrica.com/ca.chain /data/certs/ca.chain

# Add the Nginx config
# ADD default.conf /etc/nginx/conf.d/default.conf

EXPOSE 80
EXPOSE 443