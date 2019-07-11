#!/bin/sh
IMAGE=ca
VERSION=0.0.22
AWS_REPO=891293941423.dkr.ecr.eu-west-2.amazonaws.com/wordpress.checkoutafrica

# docker build --no-cache -t $IMAGE:$VERSION ./wordpress

docker tag $IMAGE:$VERSION $AWS_REPO:$VERSION

docker push $AWS_REPO:$VERSION