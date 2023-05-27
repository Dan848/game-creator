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
                    'text' => "Nome",
                    'order' => "name",
                    'href' => "#"
                ],
                [
                    'text' => "Attacco",
                    'order' => "attack",
                    'href' => "#"
                ],
                [
                    'text' => "Difesa",
                    'order' => "defence",
                    'href' => "#"
                ],
                [
                    'text' => "Intelligenza",
                    'order' => "intelligence",
                    'href' => "#"
                ],
                [
                    'text' => "Velocità",
                    'order' => "speed",
                    'href' => "#"
                ],
                [
                    'text' => "Vita",
                    'order' => "life",
                    'href' => "#"
                ],
            ]
        ],
    ],
];
