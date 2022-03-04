<?php 
  $_global_contact_ = page('global/footer/contact'); ?>
    <!-- FOOTER -->
    <footer class="container m-auto mt-4">
      <img class="w-10/12 h-32 m-auto opacity-5 -mb-24" src="<?=asset('assets/img/hexagon-top.svg')->url()?>" alt="hexagonal background">
      <img class="m-auto opacity-10" src=" <?=asset('assets/img/logomark_yellow.svg')->url()?>" alt="kirbyzone logomark">
      <div class="w-10/12 mx-auto mt-4 bg-snow/5">
        <p class="text-center pt-4 pb-2 text-snow/60 text-sm">
          connect with us
        </p>
        <p class="text-center">
          <?php if($_global_contact_->email()->isNotEmpty()): ?>
          <!-- email button -->
          <a class="contacticon" href="javascript:location='mailto:<?=$_global_contact_->email()->value()?>';void 0" title="send us an EMAIL">
            <svg class="fill-current w-11 h-12" width="33" height="38" viewBox="0 0 33 38" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M32.0293 11.6539V26.95C32.0293 28.0537 31.4567 29.065 30.5213 29.6139L17.5226 37.2649C16.5929 37.8139 15.4421 37.8139 14.5067 37.2649L1.50793 29.6139C0.572559 29.065 0 28.0479 0 26.95V11.6539C0 10.5559 0.572559 9.53889 1.50793 8.98992L14.5067 1.33898C15.4364 0.790003 16.5872 0.790003 17.5226 1.33898L30.5213 8.98992C31.4567 9.53889 32.0293 10.5559 32.0293 11.6539ZM10.5189 13.739H21.8472C22.626 13.739 23.2632 14.3838 23.2632 15.1718V23.7692C23.2632 24.5573 22.626 25.2021 21.8472 25.2021H10.5189C9.7401 25.2021 9.10289 24.5573 9.10289 23.7692L9.10997 15.1718C9.10997 14.3838 9.7401 13.739 10.5189 13.739ZM16.183 20.187L21.8472 16.6047V15.1718L16.183 18.7541L10.5189 15.1718V16.6047L16.183 20.187Z"/>
              </svg>
          </a>
          <!-- end of email button -->
          <?php endif; 

                if($_global_contact_->forum()->isNotEmpty()): ?>
          <!-- forum button -->
          <a class="contacticon" href="<?=$_global_contact_->forum()->value()?>" title="join us in the KIRBY FORUM">
            <svg class="fill-current w-11 h-12" width="33" height="38" viewBox="0 0 33 38" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M32.0293 26.95V11.6539C32.0293 10.5559 31.4567 9.53889 30.5213 8.98992L17.5226 1.33898C16.5872 0.790003 15.4364 0.790003 14.5067 1.33898L1.50793 8.98992C0.572559 9.53889 0 10.5559 0 11.6539V26.95C0 28.0479 0.572559 29.065 1.50793 29.6139L14.5067 37.2649C15.4421 37.8139 16.5929 37.8139 17.5226 37.2649L30.5213 29.6139C31.4567 29.065 32.0293 28.0537 32.0293 26.95ZM6.98375 17.6722C6.98375 15.1268 9.04643 13.0646 11.5914 13.0646H15.1878C17.7332 13.0646 19.7955 15.1273 19.7955 17.6722C19.7955 20.2163 17.7328 22.2794 15.1878 22.2794H12.4745V24.5036C12.4745 24.5036 6.98375 23.3918 6.98375 17.6722ZM18.9059 24.097C17.9541 24.0984 17.0389 23.7303 16.3531 23.0703C18.8436 22.5326 20.7105 20.3171 20.7105 17.666C20.7107 17.3485 20.6699 17.0323 20.5892 16.7253H21.6004C22.578 16.7253 23.5156 17.1136 24.2069 17.8049C24.8982 18.4962 25.2865 19.4338 25.2865 20.4114C25.2865 24.987 20.2534 25.8765 20.2534 25.8765V24.097H18.9059Z"/>
              </svg>
          </a>
          <!-- end of forum button -->
          <?php endif;            

              if($_global_contact_->discord()->isNotEmpty()): ?>
          <!-- discord button -->
          <a class="contacticon" href="<?=$_global_contact_->discord()->value()?>" title="chat with us on DISCORD">
            <svg class="fill-current w-11 h-12" width="32" height="38" viewBox="0 0 32 38" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M31.355 10.9913V26.2874C31.355 27.3911 30.7945 28.4024 29.8788 28.9513L17.1537 36.6023C16.2435 37.1513 15.117 37.1513 14.2013 36.6023L1.47618 28.9513C0.560505 28.4024 0 27.3853 0 26.2874V10.9913C0 9.89333 0.560505 8.87629 1.47618 8.32732L14.2013 0.676378C15.1114 0.127405 16.238 0.127405 17.1537 0.676378L29.8788 8.32732C30.7945 8.87629 31.355 9.89333 31.355 10.9913ZM18.2336 11.73C19.5104 11.9418 20.7314 12.3143 21.8705 12.8183C21.8805 12.8222 21.8887 12.8295 21.8936 12.8388C23.912 15.7036 24.9082 18.9365 24.5359 22.6574C24.535 22.6653 24.5325 22.6729 24.5283 22.6797C24.5242 22.6865 24.5187 22.6923 24.5121 22.6969C23.1583 23.6645 21.6474 24.4007 20.0435 24.8743C20.0322 24.8776 20.0201 24.8774 20.0089 24.8738C19.9977 24.8701 19.988 24.8632 19.981 24.8539C19.6437 24.4003 19.3369 23.9225 19.0689 23.4207C19.0653 23.4138 19.0632 23.4062 19.0627 23.3984C19.0623 23.3906 19.0636 23.3829 19.0665 23.3756C19.0694 23.3683 19.0738 23.3618 19.0795 23.3563C19.0852 23.3509 19.092 23.3467 19.0994 23.344C19.5856 23.1673 20.0487 22.9547 20.4939 22.7034C20.5019 22.6988 20.5085 22.6923 20.5133 22.6846C20.518 22.6768 20.5207 22.668 20.5212 22.659C20.5216 22.6499 20.5198 22.6409 20.5158 22.6327C20.5118 22.6246 20.5058 22.6175 20.4984 22.6121C20.4038 22.5442 20.3108 22.4733 20.2214 22.4018C20.2132 22.3954 20.2034 22.3914 20.193 22.3902C20.1826 22.389 20.1721 22.3908 20.1626 22.3952C17.2731 23.6837 14.1067 23.6837 11.183 22.3952C11.1736 22.391 11.1631 22.3895 11.1529 22.3908C11.1426 22.3921 11.133 22.3961 11.1249 22.4025C11.0356 22.4733 10.9418 22.5442 10.8479 22.6121C10.8406 22.6176 10.8347 22.6248 10.8308 22.633C10.827 22.6412 10.8253 22.6503 10.8259 22.6594C10.8265 22.6684 10.8293 22.6772 10.8342 22.6849C10.8391 22.6926 10.8459 22.6989 10.8539 22.7034C11.3007 22.9526 11.7667 23.1671 12.2476 23.3448C12.2789 23.3564 12.2938 23.3915 12.2782 23.4207C12.0161 23.9233 11.7094 24.4017 11.3654 24.8546C11.3581 24.8636 11.3483 24.8702 11.3371 24.8736C11.3259 24.8769 11.314 24.877 11.3028 24.8736C9.70164 24.3987 8.19329 23.6628 6.84095 22.6969C6.83453 22.692 6.82917 22.686 6.8252 22.6791C6.82123 22.6722 6.81874 22.6646 6.81787 22.6567C6.50592 19.4383 7.14099 16.1791 9.45793 12.8373C9.46364 12.8285 9.47195 12.8216 9.48176 12.8176C10.6216 12.3129 11.8426 11.9403 13.1187 11.7285C13.1302 11.7267 13.142 11.7284 13.1526 11.7334C13.1631 11.7383 13.1718 11.7463 13.1775 11.7563C13.3476 12.0471 13.5009 12.3471 13.6369 12.6547C14.9911 12.4562 16.3679 12.4562 17.7221 12.6547C17.8442 12.3771 18.0184 12.0258 18.1748 11.7563C18.1806 11.7464 18.1894 11.7386 18.1999 11.7339C18.2104 11.7292 18.2222 11.7278 18.2336 11.73ZM11.1093 18.9584C11.1093 19.9161 11.8352 20.6969 12.7152 20.6969C13.6094 20.6969 14.3211 19.9168 14.3211 18.9584C14.3353 18.0067 13.6161 17.22 12.7152 17.22C11.821 17.22 11.1093 18.0001 11.1093 18.9584ZM17.0468 18.9584C17.0468 19.9161 17.772 20.6969 18.6527 20.6969C19.5543 20.6969 20.2587 19.9168 20.2587 18.9584C20.2728 18.0067 19.5536 17.22 18.6527 17.22C17.7578 17.22 17.0468 18.0001 17.0468 18.9584Z"/>
              </svg>
          </a>
          <!-- end of discord button -->
          <?php endif; 

              if($_global_contact_->github()->isNotEmpty()): ?>
          <!-- github button -->
          <a class="contacticon" href="<?=$_global_contact_->github()->value()?>" title="check out our projects on GITHUB">
            <svg class="fill-current w-11 h-12" width="32" height="38" viewBox="0 0 32 38" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M31.6921 10.9913V26.2874C31.6921 27.3911 31.1256 28.4024 30.2001 28.9513L17.3381 36.6023C16.4182 37.1513 15.2795 37.1513 14.354 36.6023L1.49205 28.9513C0.566532 28.4024 0 27.3853 0 26.2874V10.9913C0 9.89334 0.566532 8.87629 1.49205 8.32732L14.354 0.676378C15.2739 0.127405 16.4126 0.127405 17.3381 0.676378L30.2001 8.32732C31.1256 8.87629 31.6921 9.89334 31.6921 10.9913ZM12.7894 27.2164C12.6887 27.2299 12.536 27.2366 12.3347 27.2366H12.3363H19.3715C19.2255 27.2366 19.1148 27.2316 19.0359 27.2215C18.9587 27.213 18.8681 27.1894 18.7675 27.154C18.7193 27.1372 18.675 27.1107 18.6372 27.0763C18.5994 27.0418 18.569 27 18.5477 26.9534C18.5024 26.8557 18.4789 26.7292 18.4789 26.5725V23.2736C18.4789 22.3802 18.2406 21.7262 17.7641 21.3132C18.2395 21.2666 18.7106 21.1838 19.1735 21.0654C19.6249 20.9405 20.0589 20.7592 20.4654 20.526C20.8911 20.2931 21.2691 19.9814 21.5795 19.6073C21.8765 19.2432 22.1198 18.761 22.3077 18.1576C22.4956 17.5541 22.5896 16.8613 22.5896 16.0791C22.5896 14.9649 22.2271 14.0176 21.5023 13.2337C21.8429 12.3976 21.806 11.4587 21.3933 10.4186C21.1366 10.3344 20.7658 10.3849 20.2792 10.5703C19.7943 10.7541 19.3732 10.9581 19.0141 11.1772L18.494 11.5093C17.6416 11.2682 16.7608 11.1502 15.8547 11.1502C14.9629 11.1476 14.0749 11.2678 13.2155 11.5076C13.0679 11.4064 12.8749 11.2834 12.6316 11.1367C12.39 10.9884 12.0058 10.8114 11.484 10.6041C10.9622 10.3967 10.5679 10.3344 10.3011 10.4186C9.89845 11.4587 9.86657 12.3976 10.2055 13.2354C9.48235 14.0176 9.11994 14.9666 9.11994 16.0791C9.10797 16.78 9.20245 17.4786 9.40014 18.1508C9.58973 18.7492 9.82966 19.2314 10.1216 19.6005C10.4269 19.9783 10.8032 20.2922 11.229 20.5243C11.6355 20.7575 12.0696 20.9387 12.5209 21.0637C12.9832 21.1826 13.4538 21.266 13.9286 21.3132C13.5628 21.6436 13.3397 22.1189 13.2575 22.7342C13.0601 22.8285 12.8523 22.8986 12.6383 22.9432C12.4186 22.9887 12.1568 23.0106 11.8548 23.0106C11.5323 23.0041 11.2191 22.9007 10.9555 22.714C10.6568 22.5167 10.4035 22.2285 10.1921 21.8509C10.0176 21.5559 9.79443 21.3182 9.52597 21.1328C9.25584 20.9491 9.02934 20.8378 8.84478 20.8024L8.56961 20.7603C8.43351 20.7502 8.29691 20.7715 8.17029 20.8226C8.09814 20.8631 8.07633 20.917 8.10317 20.9811C8.13475 21.051 8.1766 21.1158 8.22733 21.1733C8.2796 21.2365 8.33932 21.2931 8.40518 21.3418L8.50082 21.4092C8.73997 21.5332 8.94554 21.7137 9.0998 21.9352C9.27162 22.1512 9.41696 22.3872 9.53269 22.6381L9.67027 22.9567C9.78135 23.2943 9.99201 23.5901 10.2743 23.8046C10.5436 24.0144 10.8588 24.1565 11.1937 24.2193C11.5094 24.2775 11.8292 24.3097 12.1501 24.3154C12.4055 24.3239 12.6611 24.3081 12.9135 24.2682L13.2289 24.2125C13.2289 24.5615 13.2306 25.0368 13.2357 25.6352L13.2424 26.5742C13.2424 26.7764 13.192 26.9298 13.0914 27.036C13.0139 27.1288 12.9075 27.1924 12.7894 27.2164Z"/>
              </svg>
          </a>
          <!-- end of github button -->
        <?php endif; ?>
        </p>
        <p class="text-center -mt-4 pb-4">
          <?php 
              if($_global_contact_->twitter()->isNotEmpty()): ?>
          <!-- twitter button -->
          <a class="contacticon" href="<?=$_global_contact_->twitter()->value()?>" title="follow us on TWITTER">
            <svg class="fill-current w-11 h-12" width="33" height="38" viewBox="0 0 33 38" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M32.0293 11.6539V26.95C32.0293 28.0537 31.4567 29.065 30.5213 29.6139L17.5226 37.2649C16.5929 37.8139 15.4421 37.8139 14.5067 37.2649L1.50793 29.6139C0.572559 29.065 0 28.0479 0 26.95V11.6539C0 10.5559 0.572559 9.53889 1.50793 8.98992L14.5067 1.33898C15.4364 0.790003 16.5872 0.790003 17.5226 1.33898L30.5213 8.98992C31.4567 9.53889 32.0293 10.5559 32.0293 11.6539ZM21.7599 14.9619C22.4088 14.8841 23.0261 14.7121 23.6007 14.4575L23.5993 14.4595C23.1691 15.1029 22.6278 15.6645 22.0007 16.118C22.0069 16.2556 22.0104 16.3946 22.0104 16.5322C22.0104 20.7684 18.7864 25.6528 12.8891 25.6528C11.147 25.6548 9.44116 25.1547 7.97578 24.2125C8.22976 24.2424 8.48527 24.2573 8.74099 24.2573C10.1846 24.2594 11.587 23.7759 12.7226 22.8844C12.0536 22.8722 11.4053 22.651 10.8683 22.252C10.3313 21.8529 9.9325 21.2959 9.72778 20.659C10.2083 20.7506 10.7034 20.7317 11.1756 20.6039C10.45 20.4573 9.79752 20.0642 9.32879 19.4912C8.86006 18.9183 8.604 18.2008 8.60405 17.4605V17.4192C9.04919 17.6667 9.54699 17.8042 10.056 17.8204C9.6171 17.5273 9.25732 17.1304 9.0086 16.6648C8.75987 16.1993 8.6299 15.6796 8.6302 15.1518C8.6302 14.5655 8.78847 14.015 9.06373 13.5402C9.86874 14.5305 10.873 15.3405 12.0113 15.9176C13.1496 16.4948 14.3966 16.8261 15.6712 16.8901C15.5099 16.2024 15.5801 15.4808 15.8709 14.8371C16.1617 14.1935 16.6569 13.6639 17.2796 13.3305C17.9023 12.9971 18.6176 12.8786 19.3145 12.9934C20.0114 13.1083 20.6509 13.45 21.1337 13.9655C21.8517 13.8245 22.5401 13.5615 23.1692 13.1879C22.9304 13.9307 22.4295 14.5612 21.7599 14.9619Z"/>
              </svg>
          </a>
          <!-- end of twitter button -->
          <?php endif; 

              if($_global_contact_->facebook()->isNotEmpty()): ?>
          <!-- facebook button -->
          <a class="contacticon" href="<?=$_global_contact_->facebook()->value()?>" title="like us on FACEBOOK">
            <svg class="fill-current w-11 h-12" width="32" height="38" viewBox="0 0 32 38"  preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M31.355 11.6539V26.95C31.355 28.0537 30.7945 29.065 29.8788 29.6139L17.1537 37.2649C16.2435 37.8139 15.117 37.8139 14.2013 37.2649L1.47618 29.6139C0.560505 29.065 0 28.0479 0 26.95V11.6539C0 10.5559 0.560505 9.53889 1.47618 8.98992L14.2013 1.33898C15.1114 0.790003 16.238 0.790003 17.1537 1.33898L29.8788 8.98992C30.7945 9.53889 31.355 10.5559 31.355 11.6539ZM13.78 19.8252V26.8877H16.63V19.8252H19.4277L19.555 17.0294H16.63V14.9879C16.63 14.2171 16.7857 13.7527 17.7573 13.7527C18.6551 13.7527 19.4777 13.761 19.4777 13.761L19.5413 11.1502C19.5413 11.1502 18.7346 11.0417 17.6437 11.0417C14.9494 11.0417 13.78 12.7649 13.78 14.6414V17.0294H11.8005V19.8252H13.78Z"/>
              </svg>
          </a>
          <!-- end of facebook button -->
          <?php endif; 

              if($_global_contact_->linkedin()->isNotEmpty()): ?>
          <!-- linkedin button -->
          <a class="contacticon" href="<?=$_global_contact_->linkedin()->value()?>" title="connect with us on LINKEDIN">
            <svg class="fill-current w-11 h-12" width="33" height="38" viewBox="0 0 33 38" preserveAspectRatio="none" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M32.0293 11.6539V26.95C32.0293 28.0537 31.4567 29.065 30.5213 29.6139L17.5226 37.2649C16.5929 37.8139 15.4421 37.8139 14.5067 37.2649L1.50793 29.6139C0.572559 29.065 0 28.0479 0 26.95V11.6539C0 10.5559 0.572559 9.53889 1.50793 8.98992L14.5067 1.33898C15.4364 0.790003 16.5872 0.790003 17.5226 1.33898L30.5213 8.98992C31.4567 9.53889 32.0293 10.5559 32.0293 11.6539ZM9.67946 25.8763H12.6852V16.1972H9.67946V25.8763ZM9.43973 13.1196C9.43973 14.0806 10.2195 14.8769 11.1805 14.8769C12.1415 14.8769 12.9213 14.0806 12.9213 13.1196C12.9213 12.6579 12.7379 12.2152 12.4114 11.8887C12.085 11.5623 11.6422 11.3789 11.1805 11.3789C10.7188 11.3789 10.2761 11.5623 9.9496 11.8887C9.62313 12.2152 9.43973 12.6579 9.43973 13.1196ZM20.9356 25.8763H23.9346H23.9372V20.5594C23.9372 17.9576 23.378 15.9544 20.336 15.9544C18.8738 15.9544 17.8936 16.7569 17.4923 17.5175H17.4504V16.1972H14.5679V25.8763H17.5705V21.0839C17.5705 19.8216 17.8102 18.6017 19.3729 18.6017C20.9128 18.6017 20.9356 20.0416 20.9356 21.1646V25.8763Z"/>
              </svg>
          </a>
          <!-- end of linkedin button -->
        <?php endif; ?>
        </p>
    
        <!-- LEGAL DOCS -->
        <!-- TODO: create required legal docs -->
<?php 
$policies = page('global/footer/policies'); 

?>
        <p class="text-center text-sm pt-2 pb-4 text-snow/50 w-9/12 m-auto">
          <span class="text-cream/70"><?=e($policies->title()->isNotEmpty(),$policies->title(),'Our Legal Documents')?></span><br>
            <?php 
              foreach ($policies->children()->published() as $pg): ?>
                <a class="inline-block mx-2 hover:text-cream transition-colors duration-300" href="<?=$pg->url()?>"><?=$pg->title()?></a>
            <?php 
              endforeach;
            ?>
        </p>
        <!-- end of LEGAL DOCS -->
    
        <!-- COPYRIGHT BLOCK -->
        <p class="text-xs text-snow/50 text-center pb-6">
          <?=page('global/footer')->copyright()->kirbytags()?>
        </p>
        <!-- end of COPYRIGHT BLOCK -->
    
      </div>
    </footer>
    <!-- Matomo -->
<!-- Matomo -->
<script>
  var _paq = window._paq = window._paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="https://analytics.kirby.zone/";
    _paq.push(['setTrackerUrl', u+'matomo.php']);
    _paq.push(['setSiteId', '1']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.async=true; g.src=u+'matomo.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<!-- End Matomo Code -->
<!-- End Matomo Code -->
