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
         **/
        $removeCharacterMap = '[\u0615-\u061e\u064b-\u0652\u0656\u0670\u06d6-\u06dc\u06e1-\u06e5\u06ed] remove';

        $rasmString = transliterator_transliterate($removeCharacterMap, $arabicString);

        $rasmString = str_replace("ٱ", "ا", $rasmString);
        $rasmString = str_replace("ت", "ٮ", $rasmString);
        $rasmString = str_replace("ة", "ه", $rasmString);
        $rasmString = str_replace("ف", "ڡ", $rasmString);
        $rasmString = str_replace("ب", "ٮ", $rasmString);
        $rasmString = str_replace("مٰ", "م", $rasmString);
        $rasmString = str_replace("ي", "ٮ", $rasmString);
        $rasmString = str_replace("عٰ", "ع", $rasmString);
        $rasmString = str_replace("ك", "ک", $rasmString);
        $rasmString = str_replace("إ", "ا", $rasmString);
        $rasmString = str_replace("ق", "ٯ", $rasmString);
        $rasmString = str_replace("ذ", "د", $rasmString);
        $rasmString = str_replace("أ", "ا", $rasmString);
        $rasmString = str_replace("غ", "ع", $rasmString);
        $rasmString = str_replace("ض", "ص", $rasmString);
        $rasmString = str_replace("آ", "ا", $rasmString);


        if (mb_substr($rasmString, -1, 1) == "ن")
        {

            $rasmString = mb_substr($rasmString, 0, mb_strlen($rasmString)-1) . "ں";
        }

        $rasmString = str_replace("ن", "ٮ", $rasmString);


        return $rasmString;


    }
}
