<?php

require_once "lib/vendor/autoload.php";
require_once "config.php";

// Import Namespaces
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use WindowsAzure\Common\ServicesBuilder;
use WindowsAzure\Common\ServiceException;
use WindowsAzure\ServiceBus\models\BrokeredMessage;

$app = new Silex\Application();
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => './views',
));

$app->get('/', function () use ($app) {
   return $app['twig']->render('index.twig', array());
});

$app->post('/SendMessage', function (Request $request) {
    
    $msg = $request->get('msg');
    $serviceBusRestProxy = ServicesBuilder::getInstance()->createServiceBusService(SERVICE_BUS_CONNECTION_STRING);

    try {
        //Create message.
        $message = new BrokeredMessage();
        $message->setBody($msg);

        // Send message.
        $serviceBusRestProxy->sendQueueMessage(QUEUE_NAME, $message);
    
        return new RedirectResponse('/');

    } catch(ServiceException $e){
    
        $code = $e->getCode();
        $error_message = $e->getMessage();
        echo $code.": ".$error_message."<br />";
    }
});

$app->run();

?>