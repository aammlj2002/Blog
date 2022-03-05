<?php
namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(string $email)
    {
        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config("services.mailchimp.key"),
            'server' => config("services.mailchimp.server_prefix")
        ]);
        return $mailchimp->lists->addListMember("5fe879bd3d", [
            "email_address"=>$email,
            "status"=>"subscribed",
        ]);
    }
}
