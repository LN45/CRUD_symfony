<?php
/**
 * Created by PhpStorm.
 * User: ln
 * Date: 26/11/18
 * Time: 23:17
 */

namespace App\Service;


class Slugify
{
    public function generate(string $input)
    {
        $input = str_replace(' ', '-', $input);
        $input = preg_replace('~[^\pL\d]+~u', '-', $input);

        //convertir les caractères accentués à l'aide d'iconv
        $input= iconv('utf-8', 'us-ascii//TRANSLIT', $input);

        // caractère spéciaux
        $input = preg_replace('~[^-\w]+~', '' , $input);

        // retirer espaces début et fin phrase
        $input = trim($input, '-');

        return $input;
    }
}