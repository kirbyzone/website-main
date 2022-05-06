    <!-- SUBSCRIBE SECTION -->
<?php

  if($pg = page('global/subscription')):  ?>
    <section id="subscribe" class="max-w-[100vw] overflow-x-hidden relative">
      <div class="container m-auto grid grid-cols-1 sm:grid-cols-2 gap-8 justify-center p-12">
        <div class="justify-self-center sm:justify-self-end w-full max-w-xs relative">
          <img src="<?=asset('assets/img/kirbyzone-shape-white.svg')->url()?>" alt="kirbyzone hexagon" class="w-48 absolute -top-12 -left-32 opacity-5 animate-spin-3xslow delay-500 pointer-events-none">
          <!-- TODO: form processing and feedback -->
          <?php snippet('subscribes/forms',['pg'=>$pg]); ?>
        </div>
        <div class="max-w-sm justify-self-center sm:justify-self-start relative order-first sm:order-last">
          <img src="<?=asset('assets/img/kirbyzone-shape-white.svg')->url()?>" alt="kirbyzone hexagon" class="w-48 absolute top-4 -right-16 opacity-5 animate-spin-3xslow delay-500 z-0 pointer-events-none ">
          <h2 class="text-3xl font-bold"><?=$pg->title()?></h2>
          <p><?=$pg->intro_text()?></p>
          <p class="text-xs opacity-70 mt-2"><?=$pg->sub_intro_text()?></p>
        </div>
      </div>
    </section>
<?php
  endif;
  ?>
    <!-- end of SUBSCRIBE SECTION -->
