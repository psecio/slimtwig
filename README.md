## SlimTwig

A Slim application with Twig automatically thrown in.

### Install

To install, use Composer:

```bash
composer require psecio/slimtwig
```

### Usage

Use this library much in the same way as Slim and Slim-Twig.

```php
<?php
require_once __DIR__.'/vendor/autoload.php';

$app = new \SlimTwig\App();
$app->get('/', function() {
    $data = ['username' => 'ccornutt'];
    echo $this->view->out('template.php', $data);
});

$app->run();
```

It assumes that you have a `templates` directory at the same level as your `index.php`, but you can configure this with a setting:

```php
<?php
$config = [
    'settings' => [
        'template_path' => __DIR__'/my/template/path'
    ]
]
$app = new \SlimTwig\App();
```

It is recommended to use an absolute path here so that there's no relative path confusion issues.