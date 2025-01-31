<?php

/*
 * This file is part of Laravel Hashids.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Hashids Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        \App\Participant::class => [
            'salt' => \App\Participant::class.'7623e9b0009feff8e024a689d6ef59ce',
            'length' => '25',
        ],

        \App\Ekisakaate::class => [
            'salt' => \App\Ekisakaate::class.'7623e9b0009feff8e024a689d6ef59ce',
            'length' => '25',
        ],

        \App\Activeyear::class => [
            'salt' => \App\Activeyear::class.'7623e9b0009feff8e024a689d6ef59ce',
            'length' => '25',
        ],

        \App\Participanthouse::class => [
            'salt' => \App\Participanthouse::class.'7623e9b0009feff8e024a689d6ef59ce',
            'length' => '25',
        ],

        'main' => [
            'salt' => 'your-salt-string',
            'length' => 'your-length-integer',
        ],

        'alternative' => [
            'salt' => 'your-salt-string',
            'length' => 'your-length-integer',
        ],

    ],

];
