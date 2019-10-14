#!/bin/sh
## run mongo-express
echo "Run mongo-express"
echo "curl http://127.0.0.1:8081/"
echo "STOP 'CTRL + C'"
docker run --rm --network itms_docker_default -e ME_CONFIG_MONGODB_ADMINUSERNAME=root -e ME_CONFIG_MONGODB_ADMINPASSWORD=mongo -e ME_CONFIG_MONGODB_SERVER=itms_docker_mongodb_1 -p 8081:8081 mongo-express
### http://127.0.0.1:8081/
