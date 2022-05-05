<?php
    snippet('head');
?>
  <body class="bg-metal text-snow font-sans">

    <!-- HERO BANNER -->
    <section id="hero" class="pt-28 pb-12 relative overflow-x-hidden min-h-[475px]">
      <div class="container relative m-auto">
        <h1 class="sr-only"><?=site()->title()?></h1>
        <img src="<?=asset('assets/img/kirbyzone-shape-white.svg')->url()?>" alt="kirbyzone hexagon" class="w-96 absolute -top-24 -right-32 sm:-right-24 md:-right-8 lg:right-8 xl:right-24 2xl:right-36 opacity-5 animate-spin-3xslow pointer-events-none" style="z-index: -10">
        <img src="<?=asset('assets/img/logo_yellow.svg')->url()?>" alt="kirbyzone" class="w-72 max-w-[80%] mx-auto mb-4">
        <p
          class="text-xl text-center font-bold w-3/4 m-auto">
          <?= $page->title()?>
        </p>
        <!-- down button -->
        <a href="#hosting" class="transition-all transform duration-300 hover:translate-y-2 m-auto pt-6 text-cream block w-6 h-6">
          <svg class="stroke-current w-6 h-6" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M34.0328 18.8199L19.2129 33.6398L4.393 18.8199" stroke-width="5" stroke-linecap="round"/>
          </svg>
        </a>
        <!-- end of down button -->
      </div>
    </section>
    <!-- end of HERO BANNER -->

    <!-- HOSTING SECTION -->
    <section id="hosting" style="overflow-x: hidden">
      <div class="container m-auto grid grid-cols-1 sm:grid-cols-2 gap-8 p-12 justify-center">
        <div class="max-w-sm justify-self-center sm:justify-self-end">
          <h2 class="text-3xl font-bold"><?=$page->heading()?></h2>
          <p>
            <?=$page->intro_text()?>
          </p>
        </div>
        <div class="justify-self-center sm:justify-self-start">
          <img src="<?=asset('assets/img/mobile-preview.svg')->url()?>"
               alt="hosting interface preview - mobile"
               class="border-snow/20 border-[1px] rounded-lg shadow-xl sm:hidden">
          <img class="border-snow/20 border-[1px] rounded-lg shadow-xl max-w-2xl lg:max-w-3xl hidden sm:block"
          src=" <?=asset('assets/img/desktop-preview.svg')->url()?>"
          alt="hosting interface preview - desktop">
        </div>

      </div>
    </section>
    <!-- end of HOSTING SECTION -->

<?php
    snippet('subscribes/subscribe');
    snippet('footer');
?>


  </body>
</html>
