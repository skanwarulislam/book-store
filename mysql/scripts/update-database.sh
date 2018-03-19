#!/bin/bash

set -o errexit
set -o pipefail
set -o nounset

test -n "${MYSQL_ROOT_PASSWORD}"
test -n "${MYSQL_HOST}"

credentialsFile=/mysql-credentials.cnf
cat >$credentialsFile <<EOF
[client]
user=root
password=${MYSQL_ROOT_PASSWORD}
host=${MYSQL_HOST}
EOF

until check_data; do
  credentialsFile=/mysql-credentials.cnf

  mysql --defaults-extra-file=$credentialsFile < schema.sql
  mysql --defaults-extra-file=$credentialsFile bookstore < backup.sql
done
