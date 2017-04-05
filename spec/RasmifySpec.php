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


    function it_checks_the_rasm_for_every_word_in_the_quran()
    {

        $inputFile = file_get_contents(getcwd() . "/data/quran_text_rasm.csv");

        $lines = explode("\n", $inputFile);

        foreach($lines as $line)
        {

            $wordData = explode("\t", $line);

            if (sizeof($wordData) < 6) { continue; }

            $arab = $wordData[4];
            $rasm = $wordData[5];

            $this->rasmify($arab)->shouldReturn($rasm);

        }

    }

}
