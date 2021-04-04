<?php

include __DIR__.'/vendor/autoload.php';

$loop = React\EventLoop\Factory::create();
$client = new React\Http\Browser($loop);

$token = "YOUR TOKEN HERE";
$guild_id = "YOUR GUILD ID HERE";

$url = "https://discord.com/api/guilds/{$guild_id}/members?limit=1000";
$headers = array('Authorization' => "Bot {$token}");

$client->get($url, $headers)->then(function (Psr\Http\Message\ResponseInterface $response) {
    header('Content-Type: application/json');
    echo (string)$response->getBody();
});

$loop->run();