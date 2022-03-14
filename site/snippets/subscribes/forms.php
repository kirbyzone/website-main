  <!-- <form hx-post="<?=site()->url()?>/formhandler" method="POST" class="flex flex-col space-y-2 mt-2"> -->
  <form hx-post="<?=site()->url()?>/formhandler" hx-target='.form-subscription-section' hx-swap="outerHTML" class="flex flex-col space-y-2 mt-2" method="POST" class="flex flex-col space-y-2 mt-2">
 <?php 
        if(isset($result) ): ?>
          <h4> <?=$result['msg']?> </h4>
  <?php endif; ?>
    <input class="formfield" type="text" id="firstname" name="firstname" placeholder="My First Name">
    <input class="formfield" type="text" id="lastname" name="lastname" placeholder="My Last Name">
    <input class="formfield !mb-2" type="email" id="email" name="email" placeholder="My Email" required>
    <input type="hidden" name="csrf" value="<?= csrf() ?>">
    <input type="hidden" name="website" value="">
    <button type="submit" class="bg-cream/80 text-wine text-sm font-bold py-3 px-10 rounded-lg w-32 transition-all duration-300 hover:bg-cream">sign up</button>
  </form>

        