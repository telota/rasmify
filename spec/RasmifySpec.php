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

        // Read example input
        $inputFile = file_get_contents(getcwd() . "/data/quran_text_rasm.csv");

        // Split into lines
        $lines = explode("\n", $inputFile);

        // Iterate over all lines, i.e. words in the quran
        foreach($lines as $line)
        {

            // Split the line into respective fields
            $wordData = explode("\t", $line);

            // Skip if the line is invalid
            if (sizeof($wordData) < 6) { continue; }

            // Read original arabic word
            $arab = $wordData[4];

            // Read target rasm word
            $rasm = $wordData[5];

            // Run test
            $this->rasmify($arab)->shouldReturn($rasm);

        }

    }

}
