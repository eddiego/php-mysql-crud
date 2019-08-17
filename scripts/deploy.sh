#!/bin/bash
SRC_DIR=/home/ec2-user/php-mysql-crud
DEPLOY_DIR=/var/www/html

cd ${SRC_DIR}

cp *.php ${DEPLOY_DIR}
cp -r includes ${DEPLOY_DIR}

cd -