<?php

include __DIR__.'/vendor/autoload.php';

use Discord\Discord;

$token = $argv[1];
$guild_id = $argv[2];

$discord = new Discord([
	'token' => $token,
    'loggerLevel' => 'WARNING',
]);

$discord->on('ready', function ($discord) {
    global $guild_id;
    $discord->guilds->fetch($guild_id)->done(function ($guild) {
        $guild->members->freshen()->done(function ($members) {
            echo json_encode($members);
        });
    });   
});

$discord->run();