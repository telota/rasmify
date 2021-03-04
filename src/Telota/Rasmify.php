<?php

namespace Telota;

class Rasmify
{

    static function rasmify($arabicString)
    {

        /**
         * List of unicode characters that should be removed
         * '\u0615', '\u0617', '\u0618', '\u0619', '\u061A', '\u061E',
         * '\u0621',
         * '\u0640
         * '\u064B', '\u064C', '\u064D', '\u064F', '\u0650', '\u0651', '\u0652', '\u0653', '\u0654', '\u0655
         * '\u0656',
         * '\u0670',
         * '\u0674',
         * '\u06D6', '\u06D7', '\u06D8', '\u06D9', '\u06DA', '\u06DB', '\u06DC',
         * '\06DF', \u06E1', '\u06E2', '\u06E3', '\u06E4', '\u06E5', '\u06E6'
         * '\u06ED',
         **/
        $removeCharacterMap = '[\u0615-\u061e\u0621\u0640\u064b-\u0655\u0656\u0670\u0674\u06d6-\u06dc\u06df\u06e1-\u06e6\u06ed] remove';

        // Remove unwanted characters
        $rasmString = transliterator_transliterate($removeCharacterMap, $arabicString);

        // Replace arabic letter alef wasla (\u0671) with arabic letter alef (\u0627)
        $rasmString = str_replace("ٱ", "ا", $rasmString);

        // Replace arabic letter teh (\u062A) with arabic letter dotless beh (\u066E)
        $rasmString = str_replace("ت", "ٮ", $rasmString);

        // Replace arabic letter teh marbuta (\u0629) with arabic letter heh (\u0647)
        $rasmString = str_replace("ة", "ه", $rasmString);

        // Replace arabic letter feh (\u0641) with arabic letter dotless feh (\u06A1)
        $rasmString = str_replace("ف", "ڡ", $rasmString);

        // Replace arabic letter beh (\u0628) with arabic letter dotless beh (\u066E)
        $rasmString = str_replace("ب", "ٮ", $rasmString);

        // Replace arabic letter yeh (\u064A) with arabic letter alef maksura (\u0649)
        $rasmString = str_replace("ي", "ى", $rasmString);

        // Replace arabic letter kaf (\u0643) with arabic letter keheh (\u06A9)
        $rasmString = str_replace("ك", "ک", $rasmString);

        // Replace arabic letter alef with hamza below (\u0625) with arabic letter alef (\u0627)
        $rasmString = str_replace("إ", "ا", $rasmString);

        // Replace arabic letter qaf (\u0642) with arabic letter dotless qaf (\u066F)
        $rasmString = str_replace("ق", "ٯ", $rasmString);

        // Replace arabic letter thal (\u0630) with arabic letter dal (\u062F)
        $rasmString = str_replace("ذ", "د", $rasmString);

        // Replace arabic letter alef with hamza above (\u0623) with arabic letter alef (\u0627)
        $rasmString = str_replace("أ", "ا", $rasmString);

        // Replace arabic letter ghain (\u063A) with arabic letter ain (\u0639)
        $rasmString = str_replace("غ", "ع", $rasmString);

        // Replace arabic letter dad (\u0636) with arabic letter sad (\u0635)
        $rasmString = str_replace("ض", "ص", $rasmString);

        // Replace arabic letter alef with madda above (\u0622) with arabic letter alef (\u0627)
        $rasmString = str_replace("آ", "ا", $rasmString);

        // Replace arabic letter sheen (\u0634) with arabic letter seen (\u0633)
        $rasmString = str_replace("ش", "س", $rasmString);

        // Replace arabic letter jeem (\u062C) with arabic letter hah (\u062D)
        $rasmString = str_replace("ج", "ح", $rasmString);

        // Replace arabic letter zain (\u0632) with arabic letter reh (\u0631)
        $rasmString = str_replace("ز", "ر", $rasmString);

        // Replace arabic letter khah (\u062E) with arabic letter hah (\u062D)
        $rasmString = str_replace("خ", "ح", $rasmString);

        // Replace arabic letter theh (\u062B) with arabic letter dotless beh (\u066E)
        $rasmString = str_replace("ث", "ٮ", $rasmString);

        // Replace arabic letter zah (\u0638) with arabic letter tah (\u0637)
        $rasmString = str_replace("ظ", "ط", $rasmString);

        // Replace arabic letter waw with hamza above (\u0624) with arabic letter waw (\u0648)
        $rasmString = str_replace("ؤ", "و", $rasmString);

        // Replace arabic letter yeh with hamza above (\u0626) with arabic Arabic Letter Alef Maksura (\u0649)
        $rasmString = str_replace("ئ", "ى", $rasmString);

        // Replace arabic letter noon (\u0646) with arabic letter noon ghunna (\u06BA)
        $rasmString = str_replace("ن", "ں", $rasmString);

        // Replace arabic letter farsi yeh (\u06CC) with arabic letter alef maksura (\u0649)
        $rasmString = str_replace("ی", "ى", $rasmString);

        // Insert zero-width-joiner (\u200D) into lam lam ha to avoid wrong ligatures
        $rasmString = str_replace("لله", "لل‍ه", $rasmString);

        // Remove surrounding whitespace and return rasm
        return trim($rasmString);


    }
}
