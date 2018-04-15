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

$botman->hears('what is the time in {city} located in {continent}' , function (BotMan $bot,$city,$continent) {
     date_default_timezone_set("$continent/$city");
      $reply = "The time in ".$city." ".$continent." is ".date("h:i:sa");
    $bot->reply($reply);
});

$botman->fallback(function($bot) {
    $bot->reply('Sorry, I did not understand these commands. Here is a list of commands I understand: ...');
});

// Start listening
$botman->listen();
?>
