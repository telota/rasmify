<?php

namespace spec\Telota;

use Telota\Rasmify;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RasmifySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Rasmify::class);
    }

    function it_reduces_arabic_text_to_rasm()
    {

        $quranVerse1WithRasm = array("الفَاتِحَة", "بِسۡمِ", "ٱللَّهِ", "ٱلرَّحۡمَٰنِ", "ٱلرَّحِيمِ", "ٱلۡحَمۡدُ", "لِلَّهِ", "رَبِّ", "ٱلۡعَٰلَمِينَ",
            "ٱلرَّحۡمَٰنِ", "ٱلرَّحِيمِ", "مَٰلِكِ", "يَوۡمِ", "ٱلدِّينِ", "إِيَّاكَ", "نَعۡبُدُ", "وَإِيَّاكَ", "نَسۡتَعِينُ", "ٱهۡدِنَا", "ٱلصِّرَٰطَ",
            "ٱلۡمُسۡتَقِيمَ", "صِرَٰطَ", "ٱلَّذِينَ", "أَنۡعَمۡتَ", "عَلَيۡهِمۡ", "غَيۡرِ", "ٱلۡمَغۡضُوبِ", "عَلَيۡهِمۡ", "وَلَا", "ٱلضَّآلِّينَ"
        );

        $quranVerse1WithoutRasm = array(
            "الڡاٮحه", "ٮسم", "الله", "الرحمں", "الرحٮم", "الحمد", "لله", "رٮ", "العلمٮں", "الرحمں", "الرحٮم",
            "ملک", "ٮوم", "الدٮں", "اٮاک", "ٮعٮد", "واٮاک", "ٮسٮعٮں‎", "اهدٮا", "الصرط", "المسٮڡٮم‎", "صرط", "الدٮں",
            "اٮعمٮ", "علٮهم", "عٮر", "المعصوٮ", "علٮهم", "ولا", "الصالٮں‎",
        );

        foreach($quranVerse1WithoutRasm as $index => $word)
        {
            $quranVerse1WithoutRasm[$index] = transliterator_transliterate('[\u200e] remove', $word);
        }

        $testArray = array_combine($quranVerse1WithRasm, $quranVerse1WithoutRasm);

        $counter = 0;

        foreach ($testArray as $withRasm => $withoutRasm)
        {
            $counter++;
            echo "Index: " . $counter ." --- " . $withRasm . " --- " . $withoutRasm . " --- " . substr($withoutRasm, 0, 1) ." \n\n";
            $this->rasmify($withRasm)->shouldReturn($withoutRasm);
        }
        // $this->rasmify("مَٰلِكِ")->shouldReturn("ملک");


    }
}
