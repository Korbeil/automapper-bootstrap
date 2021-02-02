# automapper-bootstrap

Simple bootstrap to use [Jane's AutoMapper](https://github.com/janephp/automapper).

It will configure the AutoMapper to work on a "normal" environnement (where normal is defined by my usual standards) and 
in a standalone mode. If you want to use the AutoMapper with Symfony, please use the [corresponding bundle](https://github.com/janephp/automapper-bundle).

How to use:
```php
use Korbeil\AutoMapperBootstrap\AutoMapper;

$autoMapper = AutoMapper::bootstrap(__DIR__ . '/cache');

class User
{
    public string $name;
    public int $age;
}

$data = [
    'name' => 'Baptiste',
    'age' => 29
];

$user = $autoMapper->map($data, User::class);
//object(User)#1286 (2) {
//  ["name"]=>
//  string(8) "Baptiste"
//  ["age"]=>
//  int(29)
//}
```
