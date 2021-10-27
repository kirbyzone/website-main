<?php 
// need to include the page subscription 
$subscription = $pg; 
?>		
		<form class="subscription-form" action='formhandler' method="POST">

				<div class="success-message">
				    <p><?=$subscription->success_message()->isNotEmpty()?$subscription->success_message():"Success!"?></p>
				</div>
				<div class="error-message" >
					 <p><?=$subscription->failed_message()->isNotEmpty()?$subscription->failed_message():"Failed!"?></p>
				     <p class="addendum"></p>
				</div>

				<input type="text" name="first_name"  placeholder="First Name"> 
				<input type="text" name="last_name" placeholder="Last Name"> 
				<input type="text" name="email"  placeholder="Email Address" required> 
				<input type="hidden" name="form_pg_id" value="<?= $subscription->id() ?>">
				<input type="hidden" name="csrf" value="<?= csrf() ?>">
				<input type="hidden" name="website" value="">

					<button><?php e($subscription->cta_subscribe()->isNotEmpty(),$subscription->cta_subscribe(),'Subscribe')?></button>  
			</div>
			<!-- <div class="zAn-btn uk-light">
				
			</div> -->
		</form>

		<script type="text/javascript">
			// these functions handle the CONTACT FORM SUBMISSION via ajax:
			const contactForms = document.querySelectorAll('.subscription-form');
			Array.prototype.forEach.call(contactForms,function(el){
			  el.addEventListener('submit',function(e){
			    e.preventDefault();
			    var successMsgBox = e.target.querySelector('.success-message');
			    var errorMsgBox = e.target.querySelector('.error-message');
			    successMsgBox.setAttribute('hidden', '');
			    errorMsgBox.setAttribute('hidden', '');
			    fetch(e.target.getAttribute('action'),{
			      body: new FormData(e.target),
			      method: 'POST'
			    })
			    .then(response => {
			      if(response.ok){ 
			        return response.json();
			      } else {
			        // will catch responses with 404, 500 or other errors 
			        // - such as when sending an email from the FormHandler fails
			        throw new Error(response.status + ' | ' + response.statusText);
			      }
			    })
			    .then(data => {
			      if(data.success){
			        successMsgBox.removeAttribute('hidden');
			      } else {
			        // we rexeived a 200/OK response, but success != true: this means
			        // that form validation in the FormHandler failed. Let's warn the user:
			        let msg = '';
			        if(data.errors.indexOf('email') != -1) {
			          msg += ' Email field must contain a valid email.';
			        }
			        if(data.errors.indexOf('website') != -1) {
			          msg += ' Website field contains invalid text.';
			        }
			        if(data.errors.indexOf('csrf') != -1) {
			          msg += ' Submission failed CSRF test.';
			        }
			        if(data.errors.indexOf('exist') != -1) {
			          msg += ' Email Already Exist.';
			        }
			        errorMsgBox.querySelector('.addendum').textContent = msg;
			        errorMsgBox.removeAttribute('hidden'); 
			      }
			    })
			    .catch(error => {
			      // display responses with status != OK - such as 404, 500 or other errors.
			      errorMsgBox.textContent = errorMsgBox.textContent + error;
			      errorMsgBox.removeAttribute('hidden');
			    });
			  });
			}); 
		</script>