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
                    'text' => "Azienda",
                    'order' => "agency",
                    'href' => "#"
                ],
                [
                    'text' => "Stazione di Partenza",
                    'order' => "departure_station",
                    'href' => "#"
                ],
                [
                    'text' => "Stazione di Arrivo",
                    'order' => "arrival_station",
                    'href' => "#"
                ],
                [
                    'text' => "Orario di partenza",
                    'order' => "departure_time",
                    'href' => "#"
                ],
                [
                    'text' => "Orario di arrivo",
                    'order' => "arrival_time",
                    'href' => "#"
                ],
                [
                    'text' => "Numero Treno",
                    'order' => "train_code",
                    'href' => "#"
                ],
                [
                    'text' => "Numero Carrozze",
                    'order' => "number_of_carriages",
                    'href' => "#"
                ],
                [
                    'text' => "In orario",
                    'order' => "in_time",
                    'href' => "#"
                ],
                [
                    'text' => "Cancellato",
                    'order' => "deleted",
                    'href' => "#"
                ],
            ]
        ],
    ],
];
