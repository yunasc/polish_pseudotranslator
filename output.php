<?php

$input = file_get_contents('input.txt');

$replacements = [
'/przez/' => 'через',
'/\bprze/i' => 'перє',
'/\bprzy/i' => 'при',
'/\sże(\s|,)/' => ' що$1',
'/\ssię(\s|,)/' => ' ся$1',
'/jące/' => 'юче',
'/jąca/' => 'юча',
'/jącą/' => 'ючою',
'/jący/' => 'ючий',
'/dość/' => 'досить',
'/scy(\s|,)/' => 'skie$1',
'/ń(\s|,)/' => 'нь$1',
'/cja(\s|,)/' => 'ція$1',
'/sią/' => 'ся',
'/(?<=d|b|p|f|w|g|t)(łu)(?=d|b|p|f|w|g|t)/' => 'ол',
'/(?<=d|b|p|f|w|g|t)(ą|ę)(?=d|b|p|f|w|g|t)/' => 'у',
'/\bw(ą|ę)/' => 'ву',
'/ł|Ł/' => 'л',
'/cz|Cz/' => 'ч',
'/ę(\s|,)/' => 'у$1',
// polish special chars
'/dzi/' => 'ді',
'/si/' => 'сі', '/ci/' => 'ті', '/zi/' => 'зі', '/ni/' => 'ні',
'/ś/' => 'сь', '/ć/' => 'ть', '/ż/' => 'ж', '/ź/' => 'зь', '/ó/' => 'і',
'/la/' => 'ля',
'/sz/' => 'ш',
'/rz/' => 'рь',

// transit
'/e/' => 'е',
'/i/' => 'і',

'/іе/' => 'є',

// finalization
'/рье/' => 'рє',
'/рьэ/' => 'рє',
'/діе/' => 'дє',
'/діэ/' => 'дє',
'/ln/' => 'льн',
'/ch/' => 'х',
'/ниэ/' => 'нє',
'/lш/i' => 'льш',
'/ls/i' => 'льс',
'/lu/i' => 'лю',
'/lo/i' => 'льо',
'/li/i' => 'лі',
'/lk/' => 'льк',
];

$output = preg_filter(array_keys($replacements), array_values($replacements), $input);

$cyr = [
    'а','б','в','г','д','е','з','и','к','м','н','о','п',
    'р','с','т','у','ф','х','ц','щ',"л","й","ля","нь",
    'Д','Т','Л','П','Б','Ф','С',"З","в","В","Н","Й",'У','В'
];
$lat = [
    'a','b','w','g','d','e','z','y','k','m','n','o','p',
    'r','s','t','u','f','h','c','шч','l','j','лę','ń',
    'D','T','L','P','B','F','S','Z',"v",'V','N','J',"U",'W'
];

$output = str_replace($lat, $cyr, $output);

$replacements2 = [
'/йа/' => 'я',
'/ние/' => 'нє',
'/ниа/' => 'ня',
'/йе/' => 'є',
'/кєго(\s|,)/' => 'кого$1',
'/него(\s|,)/' => 'ного$1',
'/цйі(\s|,)/' => 'ції$1',
'/іа/' => 'я',
'/[бБ]ęд/i' => 'буд',
'/тіą/' => 'тя',
'/рьи/' => 'рі',
'/зіą/' => 'зя',
'/сйу/' => 'сію',
'/сьті/' => 'сті',
'/віą/' => 'в\'я',
'/рьę/' => 'ря',
'/рьą/' => 'ря',
'/цйу(\s|,)/' => 'цію$1',
'/чę/' => 'ча',
'/чą/' => 'ча',
'/ктір/' => 'котр',
'/йуж/' => 'вже',
'/cх/i' => 'х',
'/лą/' => 'лу',
//'/ця/' => 'ц\'я',
];

$output = preg_replace(array_keys($replacements2), array_values($replacements2), $output);

print $output."\n";
