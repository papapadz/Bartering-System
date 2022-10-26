<?php 

namespace App\Services;


class TextService {

    public function send($recipient, $subject, $status, $route)
    {   
        $message = match($status) {
            "1" => "Hi $recipient->first_name, your $subject request has been approved.  For more info you can visit the link $route - Albarter",
            "2" => "Hi $recipient->first_name, unfortunately your $subject request has been rejected. For more info you can visit the link $route - Albarter",
        };

        $ch = curl_init();
        $parameters = array(
            'apikey' => '2d786b4501a4d50bb5e9f7db15943c86', //Your API KEY
            'number' => $recipient->contact,
            'message' => $message,
            'sendername' => 'SEMAPHORE'
        );

        curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
        curl_setopt( $ch, CURLOPT_POST, 1 );

        //Send the parameters set above with the request
        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

        // Receive response from server
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $output = curl_exec( $ch );
        curl_close ($ch);

        return $output;

    }
}