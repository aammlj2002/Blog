<?php
namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(string $email, $list=null)
    {
        $list ??= config("services.mailchimp.lists.subscribers");
        
        return $this->client()->lists->addListMember($list, [
            "email_address"=>$email,
            "status"=>"subscribed",
        ]);
    }
    protected function client()
    {
        return (new ApiClient())->setConfig([
            'apiKey' => config("services.mailchimp.key"),
            'server' => config("services.mailchimp.server_prefix")
        ]);
    }
}
