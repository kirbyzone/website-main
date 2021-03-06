<!doctype html>
<html lang="en">
  <head>
    <!-- STANDARD META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php e($page->pageTitle(),$page->pageTitle(), $page->title())?></title>
    <meta name="description" content="a professional, secure and fully-managed hosting service for your Kirby websites">

    <!-- OPENGRAPH META -->
    <meta property="og:url" content="<?=$page->url()?>">
    <meta property="og:title" content="<?php e($page->pageTitle(),$page->pageTitle(), $page->title())?>">
    <meta property="og:description" content="<?=$page->page_desc()?>">
    <meta property="og:image" content="<?=asset('assets/img/socialmedia-preview.png')->url()?>">
    <meta name="twitter:card" content="summary_large_image">

    <!-- FAVICONS https://realfavicongenerator.net/ -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?=asset('assets/img/favicons/apple-touch-icon.png')->url()?>" >
    <link rel="icon" type="image/png" sizes="32x32" href="<?=asset('assets/img/favicons/favicon-32x32.png')->url()?>" >
    <link rel="icon" type="image/png" sizes="16x16" href="<?=asset('assets/img/favicons/favicon-16x16.png')->url()?>" >
    <link rel="manifest" href="<?=asset('assets/img/favicons/site.webmanifest')->url()?>" >
    <link rel="mask-icon" href=" <?=asset('assets/img/favicons/safari-pinned-tab.svg')->url()?>" color="#282A36">
    <link rel="shortcut icon" href=" <?=asset('assets/img/favicons/favicon.ico')->url()?>">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="msapplication-config" content=" <?=asset('assets/img/favicons/browserconfig.xml')->url()?> ">
    <meta name="theme-color" content="#282A36">

    <script src="https://unpkg.com/htmx.org@1.6.0"></script>
    <!-- STYLESHEETS -->
    <?= css('assets/css/main.css') ?>
     <script src="https://unpkg.com/htmx.org@1.6.0" integrity="sha384-G4dtlRlMBrk5fEiRXDsLjriPo8Qk5ZeHVVxS8KhX6D7I9XXJlNqbdvRlp9/glk5D" crossorigin="anonymous"></script>
    
    <!-- SCRIPTS -->
    <!-- <script src="/js/main.js" defer></script> -->
  </head>