This application is not finished yet.
 
To work with minikube in local environment remember to enable hypervisor in your machine.
By default minikube uses virtualbox to create its single node

````
minikube start --cpus 2 --memory 4096 --disk-size 20G
kubectl config use-context minikube 
eval $(minikube docker-env)
````
First Build the API container image
````
cd api

dcoker build -t bookstore-api:v2 .`
````
Similarly the app container image
````
cd app
docker build -t bookstore-app:v2
````
Similarly the db updater container image
````
cd mysql
docker build -t db-update:v2
````

If we want to run a local mysql 
docker run --name=test-mysql --env="MYSQL_ROOT_PASSWORD=mypassword" mysql

Now create the pods
````
kubectl create -f secrets.yaml
kubectl create -f mysql.yaml
kubectl create -f update-database.yaml
kubectl create -f api.yaml
kubectl create -f app.yaml
````
