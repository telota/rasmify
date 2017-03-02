<?php

namespace Telota;

class Rasmify
{

    function rasmify($arabicString)
    {

        /**
        '\u0615', '\u0617', '\u0618', '\u0619', '\u061A', '\u061E',
        '\u064B', '\u064C', '\u064D', '\u064F', '\u0650', '\u0651', '\u0652',
        '\u0656',
        '\u06D6', '\u06D7', '\u06D8', '\u06D9', '\u06DA', '\u06DB', '\u06DC',
        '\u06E1', '\u06E2', '\u06E3', '\u06E4', '\u06E5',
        '\u06ED',
        ];
         **/
        $removeCharacterMap = '[\u0615-\u061e\u064b-\u0652\u0656\u06d6-\u06dc\u06e1-\u06e5\u06ed] remove';

        $rasmString = transliterator_transliterate($removeCharacterMap, $arabicString);

        $rasmString = str_replace("ٱ", "ا", $rasmString);

        return $rasmString;


    }
}
