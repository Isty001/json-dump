## JSON dump

Utility to dump any kind of PHP variable in pretty JSON format. Can be useful when the output is also expected to be JSON.


#### Simple example:

```php
$var1 = "Hello";
$va2 = 15;

\JsonDump\Dumper::toJson($var1, $var2...)
```

...will output something like this:

```json
[
    {
        "type": "string",
        "value": "Hello"
    },
    {
        "type": "integer",
        "value": 15
    }
]
```
