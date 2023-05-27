<?php
return $dbPartials = [

    "headerLinks" => [
        [
            'text' => "Home",
            'href' => "home"
        ],
        [
            'text' => "Ordina per",
            'dropdown' => [
                [
                    'text' => "Forza",
                    'order' => "atack",
                    'href' => "#"
                ],
                [
                    'text' => "Difesa",
                    'order' => "defence",
                    'href' => "#"
                ],
                [
                    'text' => "Velocità",
                    'order' => "speed",
                    'href' => "#"
                ],
                [
                    'text' => "Intelligenza",
                    'order' => "intelligence",
                    'href' => "#"
                ],
                [
                    'text' => "Vita",
                    'order' => "life",
                    'href' => "#"
                ],
                [
                    'text' => "Descrizione",
                    'order' => "description",
                    'href' => "#"
                ],
                [
                    'text' => "Nome",
                    'order' => "name",
                    'href' => "#"
                ],

            ]
        ],
    ],
];
