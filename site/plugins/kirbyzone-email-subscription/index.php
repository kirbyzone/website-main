<?php 


Kirby::plugin('kirbyzone/email-subscription', [
    'blueprints' => [
            'fields/email-subscription' => __DIR__ . '/blueprints/subscription.yml'
    
    ],

    'snippets' => [
        'emailsubscriptionform' => __DIR__ . '/snippets/emailsubscriptionform.php'
    ],

    'routes' => [
      [
        'pattern' => 'subscribe',
        'method' => 'POST',
        'action'  => function() {
            // $result =[];
            if(kirby()->request()->is('POST') ) {

              $subscription = page('global/subscription');
              $result = $errors = $lists = [];
              $result['success'] = true;
                  // Lets Authenticate using TOKENS
                  try{
                      $remote = Remote::request('https://api.sendfox.com/me', [
                          'method' => 'GET',
                          'headers' => [
                              'Content-type: application/json',
                              'Authorization: Bearer ' . trim($subscription->access_token())
                          ]
                      ]);

                      //Error if Auth failed
                      if(! json_decode($remote->content())){
                          $result['success'] = false;
                          $result['msg'] = 'Authorization Failed';
                          // return snippet('subscribes/failed',$result,true);
                      }
                  }catch(Exception $e) {
                      $result['success'] = false;
                      // $errors .= 'Authorization Failed: ' . $e->getMessage() . '. ';
                      $result['msg'] = 'Authorization Failed: ' . $e->getMessage() . '. ';
                  }

              // check whether this is an ajax POST request - we'll only process those:
              $data = array_merge([
                  'email' => '',
                  'firstname' => '',
                  'lastname' => '',
                  'csrf' => ''],get());
                  if(!V::email($data['email'])) { $errors[] = 'email'; }
                  // 'website' is a honeypot field, which should be empty
                  if(!empty($data['website'])) { $errors[] = 'website'; } 
                  // our form should include a CSRF token, so let's check it:
                  if(!csrf($data['csrf'])) { $errors[] = 'csrf'; }
                  if(!empty($errors)){
                      $result['success'] = false;
                      $errs = "";
                      foreach($errors as $err){
                        $errs .= $err." | ";
                      }
                      $result['msg'] = "Validation Failed $errs";
                  }

              if(!$result['success'] == false){
                // collect list
                foreach ( $subscription->Lists_id()->toStructure() as $list){
                    array_push($lists, $list->list_id()->value());
                }
              }

              //Create Subscription
              try {
                if(!$result['success'] == false){
                  $url = 'https://api.sendfox.com/contacts';
                  $data = [
                      "email" => $data['email'],
                          "first_name" => $data['firstname'],
                          "last_name" => $data['lastname'],
                          "lists" => $lists
                  ];
                  $options = [
                      'headers' => [
                           'Authorization: Bearer ' . trim($subscription->access_token()),
                           'Content-Type: application/json'
                      ],
                      'method'  => 'POST',
                      'data'    => json_encode($data)
                   ];
                  $response = Remote::request($url, $options);

                  if(! json_decode($response->content())){
                      $result['success'] = false;
                      $result['msg'] = 'Creation of Contact Failed';
                  }
                }
              }catch(Exception $e) {
                      $result['success'] = false;
                      $result['msg'] = 'Creation of Contact Failed: ' . $e->getMessage() . '. ';
              }
              if($result['success'] == false){
                return snippet('subscribes/failed',$result,true);
              }else{
                return snippet('subscribes/success',$result,true);
              }
            }#if POST
        }
      ],

    ],


]);

?>
