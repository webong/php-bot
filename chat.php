<?php
   require_once 'vendor/autoload.php';

   use BotMan\BotMan\BotMan;
   use BotMan\BotMan\BotManFactory;
   use BotMan\BotMan\Drivers\DriverManager;
   
   $config = [
    // Your driver-specific configuration
    // "telegram" => [
    //    "token" => "TOKEN"
    // ]
];

   DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

   $botman = BotManFactory::create($config);

  // Give the bot something to listen for.
$botman->hears('hello', function (BotMan $bot) {
    $bot->reply('Hello yourself.');
});

$botman->hears('Good Morning', function (BotMan $bot) {
    $bot->reply('Hey John');
});

$botman->hears('What is the time in {uyo}' , function (BotMan $bot,$loc) {
    
    $bot->reply('The time in is '. $loc);
});

// Start listening
$botman->listen();
?>
