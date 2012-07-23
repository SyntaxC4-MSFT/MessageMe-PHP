<?php

require_once "./lib/vendor/autoload.php";

// Import Namespaces
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\ServiceException;

$app = new Silex\Application();
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => './views',
));

$app->get('/', function () use ($app) {
   return $app['twig']->render('index.twig', array());
});

$app->post('/SendMessage', function (Request $request) {
    
    $sbconnectionstring = 'Endpoint=https://cf-msgme.servicebus.windows.net;SharedSecretIssuer=owner;SharedSecretValue=zrl6+YUAEJ3nGBA54VaQLR2g1NglYY/4sor3tAW7wi0=';

    $msg = $request->get('msg');
    $serviceBusRestProxy = ServicesBuilder::getInstance()->createServiceBusService($sbconnectionstring);

    //try {
    //    //Create message.
    //    $message = new BrokeredMessage();
    //    $message->setBody($msg);

    //    // Send message.
    //    $serviceBusRestProxy->sendQueueMessage("sbmessageme", $message);
    //
    //    return new Response('Thanks for the message!', 200);

    //} catch(ServiceException $e){
    //
    //    $code = $e->getCode();
    //    $error_message = $e->getMessage();
    //    echo $code.": ".$error_message."<br />";
    //}
});

$app->run();

?>