<?php 
  // pass variable from routes /subscribe
  // $msg
?> 
  <!-- SUBSCRIBE SECTION -->
  <section id="subscribe">
    <div class="container m-auto grid grid-cols-1 sm:grid-cols-2 gap-8 justify-center p-12">
      <div class="justify-self-center sm:justify-self-end w-full max-w-xs relative">
        <img src="<?=asset('assets/img/kirbyzone-shape-white.svg')->url()?>" alt="kirbyzone hexagon" class="w-48 absolute -top-24 -left-32 opacity-5 animate-spin-3xslow delay-500 z-0 pointer-events-none">
        <!-- TODO: form processing and feedback -->
      <?php snippet('subscribes/forms'); ?>
      </div>
      <div class="max-w-sm justify-self-center sm:justify-self-start relative order-first sm:order-last">
        <img src="<?=asset('assets/img/kirbyzone-shape-white.svg')->url()?>" alt="kirbyzone hexagon" class="w-48 absolute top-4 -right-16 opacity-5 animate-spin-3xslow delay-500 z-0 pointer-events-none transform rotate-45">
        <h2 class="text-3xl font-bold">SUCCESS</h2>
        <p>Sign up to be first-in-line for our launch, and to receive occasional news, updates and promotions about our upcoming services and products.</p>
        <p class="text-xs opacity-70 mt-2">We'll never send you any spam, and we'll never sell or give away your personal data to anyone.</p>
      </div>
    </div>
  </section>
  <!-- end of SUBSCRIBE SECTION -->