This application is not finished yet. But it can be tested to is current state.
How to run the application
First Build the API container image
cd api
dcoker build -t bookstore-api:v2 .

Similarly the app container image
cd app
docker build -t bookstore-app:v2

If we want to run a local mysql 
docker run --name=test-mysql --env="MYSQL_ROOT_PASSWORD=mypassword" mysql

To to the pod deploys for kubernetes in local machine install minikube and kubectl

Now to work with minikube in local environment remember to enable hypervisor in your machine.
First start the minikube it uses virtualbox buy default

`minikube start`

`kubectl config use-context minikube` 

`eval $(minikube docker-env)`
````
kubectl create -f mysql.yaml
kubectl create -f update-database.yaml
kubectl create -f api.yaml
kubectl create -f app.yaml
````
