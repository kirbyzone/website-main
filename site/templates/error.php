<?php 
    snippet('head'); 
?>
<body class="bg-metal text-snow font-sans max-w-full overflow-x-hidden">
  <main class="error container mx-auto mt-32 max-w-[550px] w-10/12 mb-16">
    <img src="<?=asset('assets/img/logo_yellow.svg')->url()?>" alt="Kirbyzone Logo" class="w-48" />

    <h6 class="mt-16 text-xl">error</h6>
    <h1 class="text-8xl font-bold text-cream mb-4">404</h1>
    <!-- <p>Oops! The page you're looking for can't be found. You might want to try visiting our <a href="https://kirby.zone">home page</a> — or if you believe you found a bug in our site, please <a href="mailto:support@kirby.zone">let us know</a>!</p> -->
    <p><?=$page->intro_text()->kt()?></p>

  </main>

<?php 
   snippet('footer');
?>

</body>
</html>
