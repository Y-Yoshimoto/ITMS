FROM mongo
MAINTAINER y.yoshimoto
EXPOSE 27017

COPY initdb/*  /docker-entrypoint-initdb.d/
CMD ["mongod", "--auth"]

## mongo-express
### Modify "network"
### docker run --rm --network sample_default -e ME_CONFIG_MONGODB_ADMINUSERNAME=root -e ME_CONFIG_MONGODB_ADMINPASSWORD=mongo -e ME_CONFIG_MONGODB_SERVER=itms_docker_mongodb_1 -p 8081:8081 mongo-express
### http://127.0.0.1:8081/
