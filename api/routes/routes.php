<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Illuminate\Database\Connection;


$app->get('/book/{id}', function( Request $request, Response $response, $args) {
        $db = $this->get(Connection::class);
        $id = $args['id'];
        $book = Book::find($id);
        return $response->withJson($book);
});

$app->get('/books/', function (Request $request, Response $response, $args) {

    $db = $this->get(Connection::class);
    $isbn = (string)$request->getQueryParam('isbn');
    error_log(print_r($isbn, TRUE));
    if(!empty($isbn)){
        $books = Book::where('isbn', $isbn)->first();
        error_log(print_r($books, TRUE));
    } else{
        $books = Book::all();
    }

    return $response->withJson($books)
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

$app->get('/books/search/', function (Request $request, Response $response, $args) {

    $db = $this->get(Connection::class);
    $title = (string)$request->getQueryParam('title');
    $isbn = (string)$request->getQueryParam('isbn');
    if(!empty($isbn) ){
        $books = Book::where('isbn', 'LIKE', "%$isbn%")->get();
    } else if(!empty($title)){
        $books = Book::where('title', 'LIKE', "%$title%")->get();
    }

    return $response->withJson($books);
});


$app->post('/books/', function(Request $request, Response $response) {
    $db = $this->get(Connection::class);
    $data = $request->getParsedBody();
    $book = new Book(array(
        'isbn' => $data['isbn'],
        'title' => $data['title'],
        'addedon' => $data['addedon']
    ));
    $book->save();
    return $response->withStatus(201)->withJson($book);
});

$app->get('/labels/', function (Request $request, Response $response, $args) {

    $db = $this->get(Connection::class);
    $labels = Label::all();
    return $response->withJson($labels);
});

$app->post('/labels/', function (Request $request, Response $response, $args) {

    $db = $this->get(Connection::class);
    $data = $request->getParsedBody();
    $label = new Label(array(
        'name' => $data['name']
    ));
    $label->save();
    return $response->withStatus(201)->withJson($label);
});

$app->post('/book/{id}/labels/', function (Request $request, Response $response, $args) {

    $db = $this->get(Connection::class);
    $data = $request->getParsedBody();
    $id = $args['id'];
    $book = Book::find($id);
    error_log(printf($book,TRUE));
    $book->labels()->attach($data);
    return $response->withStatus(201);
});

$app->get('/book/{id}/labels/', function (Request  $request, Response $response, $args){
    $db = $this->get(Connection::class);
    $book_id = $args['id'];
    $labels = Book::find($book_id)->labels()->get();
    return $response->withStatus(200)->withJson($labels);
});

