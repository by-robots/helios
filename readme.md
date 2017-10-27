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

- `MISSING_DEPENDENCIES` - Dependencies not found. Most likely `composer install`
needs to be run.
- `HELIOS_NOT_FOUND` - The Helios\\Helios class was not found.
- `MEMORY_NOT_FOUND` - A data value was attempted to be retrieved from the memory
store but was not found.
