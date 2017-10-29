# Helios
![](https://vignette4.wikia.nocookie.net/deusex/images/5/55/Helios_infolink.jpg/revision/latest?cb=20140909120548&path-prefix=en)

An AI assistant.

## Requirements
PHP Dependencies can be installed with `composer install`.

- The Stanford NLP module requires the basic
[English Stanford Tagger version 3.8.0](https://nlp.stanford.edu/software/stanford-postagger-2017-06-09.zip).
This should be added to the `./Programs` folder. Simply unzip the file and add
the resultant folder into `./Programs`.

## Errors
Exceptions thrown, and what they mean.

- `MEMORY_NOT_FOUND` - A data value was attempted to be retrieved from the
memory store but was not found.
- `SENTENCE_INCOMPLETE` - The supplied input could not be interpreted. Input
should contain one verb and one noun.
- `NO_ACTION` - No action is currently available for the given input.
