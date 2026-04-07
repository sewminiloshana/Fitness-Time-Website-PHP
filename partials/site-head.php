<?php
if (!isset($pageTitle)) {
    $pageTitle = 'Fitness Time';
}

if (!isset($pageDescription)) {
    $pageDescription = 'Fitness Time is a boutique training studio offering classes, coaching, and memberships for every fitness level.';
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?= e($pageDescription) ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" />
    <link rel="stylesheet" href="styles.css" />
    <title><?= e($pageTitle) ?></title>
  </head>
  <body id="top" data-page="<?= e($page) ?>">
