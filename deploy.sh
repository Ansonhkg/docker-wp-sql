#!/bin/sh

# Configuration
IMAGE=ca-ssl
VERSION=0.0.1
ECR_URL=891293941423.dkr.ecr.eu-west-2.amazonaws.com

# Nginx
NGINX_REPO=$ECR_URL//wp-ssl
NGINX_CONTAINER=nginx.ca

# Wordpress
WP_REPO=$ECR_URL/wordpress.checkoutafrica

# Build from container, tag and push.
docker commit $NGINX_CONTAINER $IMAGE:$VERSION

docker tag $IMAGE:$VERSION $NGINX_REPO:$VERSION

docker push $NGINX_REPO:$VERSION