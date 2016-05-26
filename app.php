<?php

require __DIR__ . '/vendor/autoload.php';

use Slim\Http;
use Slim\Http\Request;
use Slim\Http\Response;

$app = new \Slim\App([
    "settings" => [
        "displayErrorDetails" => true
    ]
]);

$app->get( '/', function( Request $request, Response $response ) {

    return $response
        ->withStatus(200)
        ->write( "Howdy!" );

});

$app->get( 'get_events.jsp', function( Request $request, Response $response ) {

    //$predis = new Predis();

    return $response
        ->withStatus(200)
        ->write( "Array of Events here" );
        //->write( $predis->getData('events') );

});


$app->get( '/hello/{name}', function( Request $request, Response $response ) {

    $name = $request->getAttribute('route')->getArgument('name');

    return $response
        ->withStatus(200)
        ->write( "Hello {$name}" );

});

//require __DIR__ . '/../wp-config-local.php';
//
//function getDB()
//{
//    $dbhost = DB_HOST;
//    $dbuser = DB_USER;
//    $dbpass = DB_PASSWORD;
//    $dbname = DB_NAME;
//
//    $mysql_conn_string = "mysql:host=$dbhost;dbname=$dbname";
//    $dbConnection = new PDO($mysql_conn_string, $dbuser, $dbpass);
//    $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    return $dbConnection;
//}
//
//
//$app->get('/getScore/:id', function ($id) use ($app) {
//
//    $response = $app->response;
//
//    try
//    {
//        $db = getDB();
//
//        $query = $db->prepare("SELECT * FROM students WHERE student_id = :id");
//
//        $query->bindParam(':id', $id, PDO::PARAM_INT );
//        $query->execute();
//
//        $student = $query->fetch( PDO::FETCH_OBJ );
//
//        /**
//         * @var Http\Response $response
//         */
//
//        if( $student ) {
//            echo $response
//                ->withStatus(200)
//                ->withJson( $student );
//            $db = null;
//        } else {
//            throw new PDOException('No records found.');
//        }
//
//    } catch(PDOException $e) {
//        echo $response
//            ->withStatus(404)
//            ->withJson( array( "error" => array( "text" => $e->getMessage() ) ) );
//    }
//});
//
//$app->post('/updateScore', function() use($app) {
//
//    $allPostVars = $app->request->post();
//    $score = $allPostVars['score'];
//    $id = $allPostVars['id'];
//
//    try
//    {
//        $db = getDB();
//
//        $query = $db->prepare("UPDATE students SET score = :score WHERE student_id = :id" );
//
//        $query->bindParam(':score', $score, PDO::PARAM_INT);
//        $query->bindParam(':id', $id, PDO::PARAM_INT);
//        $query->execute();
//
//        $app->response->setStatus(200);
//        $app->response()->headers->set('Content-Type', 'application/json');
//        echo json_encode(array("status" => "success", "code" => 1));
//        $db = null;
//
//    } catch(PDOException $e) {
//        $app->response()->setStatus(404);
//        echo '{"error":{"text":'. $e->getMessage() .'}}';
//    }
//
//});

$app->run();