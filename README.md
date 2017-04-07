# Description

Reduce arabic text to its rasm, i.e. remove vocalization marks, diacritics so you only are left with a *basic consonant skeleton*.

For example, the first verse of the Qur'an as found on [corpuscoranicum.de](http://corpuscoranicum.de/index/index/sure/1/vers/1):

Compare the following examples:

**Text with diacritics etc**
![First sura of the Qur'an with diacritics etc](assets/quranic_text_with_diacritics.png)

**Text without diacritics (rasmified)**
![First sura of the Qur'an rasmified](assets/quranic_text_rasmified.png)

# Try it

Check out the demo [here](https://telota.github.io/rasmify.js/demo/)

# Installation

Require this package using Composer. Run the following command in the terminal:

```composer require "telota/rasmify":"0.1.*"```

# Usage

To convert an arabic string to its *rasm*, use the following code:

```
use Telota\Rasmify;

$rasmified = Rasmify::rasmify($arabicString);
```