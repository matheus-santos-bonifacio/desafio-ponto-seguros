<?php

function baseLayout(string $page_title, string $content) {
  $style = file_get_contents(__DIR__ . '/../css/bootstrap.min.css');

  $base_layout = <<<BASE_LAYOUT
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>$page_title</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <style>$style</style>
  </head>
  <body>
    <section>$content</section>
  </body>
</html>
BASE_LAYOUT;

  return $base_layout;
}
