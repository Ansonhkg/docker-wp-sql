#!/bin/sh

# Configuration
IMAGE=ca-ssl
VERSION=0.0.1
ECR_URL=891293941423.dkr.ecr.eu-west-2.amazonaws.com

# Nginx
docker-compose up -d --build nginx
NGINX_REPO=$ECR_URL/wp-ssl
NGINX_CONTAINER=nginx.ca

docker commit $NGINX_CONTAINER $IMAGE:$VERSION

docker tag $IMAGE:$VERSION $NGINX_REPO:$VERSION

docker push $NGINX_REPO:$VERSION

# Wordpress
# WP_REPO=$ECR_URL/wordpress.checkoutafrica
# WP_CONTAINER=$ECR_URL/wordpress.ca

# # Build from container, tag and push.
# docker commit $WP_CONTAINER $IMAGE:$VERSION

# docker tag $IMAGE:$VERSION $WP_REPO:$VERSION

# docker push $WP_REPO:$VERSION