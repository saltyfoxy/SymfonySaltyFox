<?php


namespace App\Services;


class Slugify
{
    public function generate(string $input): string
    {
        $special =[' ','Â', 'Ê', 'Î', 'Ô', 'Û', 'Ä', 'Ë', 'Ï', 'Ö', 'Ü', 'À', 'à', 'ç', 'é', 'è', 'ù', 'ô', 'û', 'ü', 'ö', 'ê', 'ë', "'", "\"", ".", ";", ",", "?", "!", ")", "(", "{", "}", "[", "]"];
        $normal = ['-','A','E','I','O','U','A','E','I','O','U','A','a', 'c', 'e', 'e', 'u', 'o', 'u', 'u', 'o', 'e', 'e', "", "", "", "", "", "", "", "", "", "", "", "", ""];
        $input = rtrim($input);
        $input = ltrim($input);
        $input = str_replace($special, $normal, $input);
        $input = strtolower($input);
        return $input;
    }
}

