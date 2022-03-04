<?php

return [

    'debug' => true,
    'sendfox_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjMwZDk4MmUxMjIzMjY5YmRiYjMxZmU2NGJlZjQ3MjQzNDMyYWNiMDQzNTA5OWRhNzNiNDU1ZGU4MGY5ZmRhZWYwOGJkYzUzODkyNWUzOTUyIn0.eyJhdWQiOiI0IiwianRpIjoiMzBkOTgyZTEyMjMyNjliZGJiMzFmZTY0YmVmNDcyNDM0MzJhY2IwNDM1MDk5ZGE3M2I0NTVkZTgwZjlmZGFlZjA4YmRjNTM4OTI1ZTM5NTIiLCJpYXQiOjE2MzUyOTE2MDAsIm5iZiI6MTYzNTI5MTYwMCwiZXhwIjoxNjY2ODI3NjAwLCJzdWIiOiI0NzY1OSIsInNjb3BlcyI6W119.jXpxcyeeh00LveeCCUyu-p7EItkX7HghLx-mjnnc1wAN_zq9Vc3OIcxUwOsy0wYSOCDJNq9sXE26RxoVnfRxChHuJidWErdqvXmPvjGYFP3pm1bWbw032clI_sFIyRZurokMAVQ5acts2L9HQ09eNmUcAQ6RvaBNU7IglFpMorToYmgV94hB2qHI9RSfJEzbUrLi2mmsQggVQpR2FOLchp6E6_A_7v5jP-n6cEN5lviwhliba6f7T4fHiI-yee_xmG_h0FpRdnkXIoawaKenQwDR9mu0wGieh1hMSxESKYYybRwEOVM3f8ImFRX2pXFppu4E8imi_BJItRkBJfJX47axh_BoCZekSyo-2RAPWo1B5nXE-ziRll5etD1FJabPrHRoCb1IQrGJgjrr08BkOaaBzLcrTDdG5NyjCmPJtKA8u6FAAL2eKcv0_Na_w6BNhTatV9nJXBhlVgAZJHf3IcwKcVFqNrC1u0nr4Tk_b_rsgjobKDXkoZFA8NDgQlAkV5sDYiPXnQye-Ak2tossXK6GR5ebvM-2DMTJHSFpH3lUTFaW2Y0eCxTn6WholtdNrn25TQksjpjbnf_5CTzjL5LJPq6edED_jzNLNdZE41HaSjEZ-OUQv2iQY_jP7hB90DD2ouFlTQ_kCJJPI24NpuaUXU1NotzdwBnviP4NtU0',



    'routes' => [
        [
            'pattern' => ['formhandler'],
            'method' => 'POST',
            'action'  => function() {
                $subsription = page('global/subscription');
                $validationErr = [];
                $list_array = [];
                $req = kirby()->request();
                // check whether this is an ajax POST request:
                $data_array = array_merge([
                    'email' => '',
                    'first_name' => '',
                    'last_name' => '',
                    'csrf' => ''],$req->data());
                if(!V::email($data_array['email'])) { $validationErr[] = 'email'; }
                // 'website' is a honeypot field, which should be empty
                if(!empty($data_array['website'])) { $validationErr[] = 'website'; } 
                // our form should include a CSRF token, so let's check it:
                if(!csrf($data_array['csrf'])) { $validationErr[] = 'csrf'; }
                
                if(!empty($validationErr)){
                    $msg = "validation failed";
                    return ['status'=>false, 'msg'=>$msg];
                }

                foreach($subsription->lists_id()->toStructure() as $list){
                   array_push($list_array,$list->list_id()->value());
                }   

                $result = site()->addToSendFox($list_array,$data_array);
                if($result['status'] == true){
                    $result['msg'] = $subsription->success_message();
                }else{
                    $result['msg'] = $subsription->failed_message();
                }
                return snippet('subscribes/forms', ['result'=>$result], true);
            }
      ],
    ]

];
