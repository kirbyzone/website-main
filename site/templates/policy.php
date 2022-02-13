<?php 
    snippet('head'); 
?>
  <body class="bg-metal text-snow font-sans max-w-full overflow-x-hidden">

    <!-- HERO BANNER -->
    <header id="hero" class="pt-28 pb-12">
      <div class="container relative m-auto">
        <img src="/assets/img/kirbyzone-shape-white.svg" alt="kirbyzone hexagon" class="w-96 absolute -top-24 -right-32 sm:-right-24 md:-right-8 lg:right-8 xl:right-24 2xl:right-36 opacity-5 animate-spin-3xslow pointer-events-none" style="z-index: -10">
        <img src="/assets/img/logo_yellow.svg" alt="kirbyzone logo" class="w-72 max-w-[80%] mx-auto">
        <h1 class="text-center font-bold text-3xl mb-4">Privacy Policy</h1>
        <p class="text-center text-sm">
          last updated on 30 September 2021
        </p>
        <!-- down button -->
        <a href="#policy" class="transition-all transform duration-300 hover:translate-y-2 m-auto pt-6 text-cream block w-6 h-6">
          <svg class="stroke-current w-6 h-6" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M34.0328 18.8199L19.2129 33.6398L4.393 18.8199" stroke-width="5" stroke-linecap="round"/>
          </svg>
        </a>
        <!-- end of down button -->
      </div>
    </header>
    <!-- end of HERO BANNER -->

    <!-- MAIN POLICY -->
    <main id="policy" class="my-6">
      <div class="container mx-auto px-8 sm:px-12 md:px-20 lg:px-32 xl:px-48">
        <?=$page->intro_text()->kt()?>
      </div>
    </main>
    <!-- end of MAIN POLICY -->

    <!-- FOOTER -->
<?php 
   snippet('footer');
?>


  </body>
</html>
