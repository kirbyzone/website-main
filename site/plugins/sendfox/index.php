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
            // ROUTE TO HANDLE CONTACT FORM SUBMISSIONS
            // in 'pattern', we must have the same url being called from our ajax javascript function
            'pattern' => 'formhandler',
            'method' => 'POST',
            'action' => function(){
                $data = get();
                $kirby = kirby();
                if(!isset($data['form_pg_id'])) {
                    $result['errors'] = 'page_id';
                    $result['success'] = false;
                    $result['msg'] = 'Page ID information not found';
                    return $result;
                }
                if($subscription = page($data['form_pg_id']) ){
                        //initialize needed variable
                        $errors = '';
                        $result = [];
                        $lists = [];

                        $ajax = $subscription->is_ajax()->toBool();
                        $result['success'] = true;
                        $result['failed_msg'] = $subscription->failed_message()->isNotEmpty()?$subscription->failed_message()->value():"Failed!";
                        $result['success_msg'] = $subscription->success_message()->isNotEmpty()?$subscription->success_message()->value():"Success!";
                        $successPage = $subscription->success_page()->exists() ? $subscription->success_page()->toPage() : false;
                        $errorPage = $subscription->error_page()->exists() ? $subscription->error_page()->toPage() : false;

                        $is_addToMailingList = true;
                    if(isset( $data['is_landing'] )){
                        $is_addToMailingList = false;
                        $pgl = site()->children()->findById( get('is_landing') );
                        $pg = page('sessions');
                        $from    = $pg->sender_email()->value();
                        $to = $pg->reciever_email()->value();
                        $result['success_msg'] = $pgl->newsletter_success()->isNotEmpty()?$pgl->newsletter_success()->value():'Successfully submitted!' ;

                        $bodyText = "a visitor click a download button on the page (".$pgl->title().") \n. they submitted their email address - ".$data['email'];
                        try{
                              $kirby->email([
                                'from' => $from,
                                'to' => $to,
                                'subject' =>"Download Form - ".$pgl->title(),
                                'body'=> $bodyText,
                              ]);
                        }catch(Exception $error){
                            echo $error;
                        }

                        if($pgl->add_mailing_list()->toBool()){
                            $is_addToMailingList = true;
                        }

                    }#is_landing

                    if($is_addToMailingList){
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
                                $result['errors'] = 'Auth';
                                $result['success'] = false;
                                $result['msg'] = 'Authorization Failed';
                                return $ajax ? $result :  $errorPage->render(['result'=>$result]);
                            }
                        }catch(Exception $e) {
                            $errors .= 'Authorization Failed: ' . $e->getMessage() . '. ';
                        }
                    }#is_addToMailingList

                        $req = kirby()->request();
                        // check whether this is an ajax POST request - we'll only process those:
                        $data = array_merge([
                            'email' => '',
                            'first_name' => '',
                            'last_name' => '',
                            'csrf' => ''],$req->data());

                        if(!V::email($data['email'])) { $errors[] = 'email'; }
                        // 'website' is a honeypot field, which should be empty
                        if(!empty($data['website'])) { $errors[] = 'website'; } 
                        // our form should include a CSRF token, so let's check it:
                        if(!csrf($data['csrf'])) { $errors[] = 'csrf'; }
                        
                        if(!empty($errors)){
                            $result['success'] = false;
                            $result['msg'] = 'Validation Failed';
                            $result = ['errors' => $errors];
                            return $ajax ? $result :  $errorPage->render(['result'=>$result]);
                        }

                        if($is_addToMailingList){
                            if(isset( $data['is_landing'] )){
                                $pgl = site()->children()->findById( get('is_landing') );
                                if($pgl->newletter_lists()->toBool() and $pgl->add_mailing_list()->toBool() ){
                                    foreach ( $pgl->landing_lists_id()->toStructure() as $list){
                                        array_push($lists, $list->list_id()->value());
                                    }
                                }else{
                                    foreach ( $subscription->Lists_id()->toStructure() as $list){
                                        array_push($lists, $list->list_id()->value());
                                    }
                                }
                            }else{
                                // collect list
                                foreach ( $subscription->Lists_id()->toStructure() as $list){
                                    array_push($lists, $list->list_id()->value());
                                }
                            }
                        }

                        if($is_addToMailingList){
                            //Create Subscription
                            try {
                                $url = 'https://api.sendfox.com/contacts';
                                $data = [
                                    "email" => $data['email'],
                                        "first_name" => $data['first_name'],
                                        "last_name" => $data['last_name'],
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
                                    $result['errors'] = 'Auth';
                                    $result['success'] = false;
                                    $result['msg'] = 'Creation of Contact Failed';
                                    return $ajax ? $result :  $errorPage->render(['result'=>$result]);
                                }
                            }catch(Exception $e) {
                                $errors .= 'Creation of Contact Failed: ' . $e->getMessage() . '. ';
                            }
                        }
                        //response
                        if($result['success'] == true){
                            $result['errors'] = 'success';
                            $result['success'] = true;
                            $result['msg'] = $result['success_msg'];
                             return $ajax ? $result :  $successPage->render(['result'=>$result]);
                        }else{
                            $result['errors'] = 'failed';
                            $result['success'] = false;
                            $result['msg'] = $errors;
                             return $ajax ? $result :  $errorPage->render(['result'=>$result]);
                        }
                }

            }
        ],

    ],


]);

?>
