<?php 


Kirby::plugin('kirbyzone/sendfox', [
    'blueprints' => [
        'fields/email-subscription' => __DIR__ . '/blueprints/subscription.yml'
    ],

    #creating siteMethods
    #parameter
    #listArr = array of list that will include
    #dataArr = data consist of email, first_name and last_name
    'siteMethods' => [
        'addToSendFox' => function ($listArr, $dataArr) {
            $status = true;
            $msg ="success";
            if(count($listArr) <= 0){
                $msg = "Lists should not empty";
                return ['status'=>false, 'msg'=>$msg];
            }

            if(count($dataArr) <= 0){
                $msg = "Data should not empty";
                return ['status'=>false, 'msg'=>$msg];
            }else{
                if(isset($dataArr['email'])){
                    if(!V::email($dataArr['email'])) { 
                        $msg = 'Email is not correct';
                        return ['status'=>false, 'msg'=>$msg];
                    }
                }
            }

            if(empty(option('sendfox_token')) ){
                $msg = "sendfox access token is missing";
                return ['status'=>false, 'msg'=>$msg];
            }

            // Lets Authenticate if the access token is valid
            try{
                $remote = Remote::request('https://api.sendfox.com/me', [
                    'method' => 'GET',
                    'headers' => [
                        'Content-type: application/json',
                        'Authorization: Bearer ' . trim(option('sendfox_token'))
                    ]
                ]);
                //Error if Auth failed
                if(! json_decode($remote->content())){
                    $msg = "Authorization Failed";
                    return ['status'=>false, 'msg'=>$msg];
                }
            }catch(Exception $e) {
                return ['status'=>false, 'msg'=>$e->getMessage()];
            }

            $data = array_merge(
                [
                    'email' => '',
                    'first_name' => '',
                    'last_name' => ''
                ],$dataArr);

            //Create Subscription and send to sendfox
            try {
                $url = 'https://api.sendfox.com/contacts';
                $data = [
                    "email" => $dataArr['email'],
                        "first_name" => $dataArr['first_name'],
                        "last_name" => $dataArr['last_name'],
                        "lists" => $listArr
                ];
                $options = [
                    'headers' => [
                         'Authorization: Bearer ' . trim(option('sendfox_token')),
                         'Content-Type: application/json'
                    ],
                    'method'  => 'POST',
                    'data'    => json_encode($data)
                 ];
                $response = Remote::request($url, $options);

                if(! json_decode($response->content())){
                    $msg = "Creation of Contact Failed";
                    return ['status'=>false, 'msg'=>$msg];
                }
            }catch(Exception $e) {
                return ['status'=>false, 'msg'=>$e->getMessage()];
            }

            return ['status'=>$status, 'msg'=>$msg];;
        }
    ]
]);

?>
