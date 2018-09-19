<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Replace path_to_sdk_inclusion with the path to the SDK as described in
// http://docs.aws.amazon.com/aws-sdk-php/v3/guide/getting-started/basic-usage.html
define('REQUIRED_FILE','aws.phar');

// Replace us-west-2 with the AWS Region you're using for Amazon SES.
define('REGION','us-west-2');

define('CHARSET','UTF-8');

require REQUIRED_FILE;

use Aws\Ses\SesClient;
use Aws\Ses\Exception\SesException;

class Aws
{
  public function sendMailUsingSES($subject,$htmlbody,$recipient,$sender) {

    $client = SesClient::factory(array(
        'version'=> 'latest',
        'region' => REGION,
        'credentials' => [
          'key' => 'AKIAI5HC4NBF5VROYU4Q',
          'secret' => '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',
        ],
    ));

    try {
      $result = $client->sendEmail([
            'Destination' => [
                'ToAddresses' => [
                    $recipient,
                ],
                'BccAddresses' => [
                  'shaula.musni@carmudi.com.ph',
                ],
            ],
            'Message' => [
                'Body' => [
                    'Html' => [
                        'Charset' => CHARSET,
                        'Data' => $htmlbody,
                    ],
              'Text' => [
                        'Charset' => CHARSET,
                        'Data' => '',
                    ],
                ],
                'Subject' => [
                    'Charset' => CHARSET,
                    'Data' => $subject,
                ],
            ],
            'Source' => $sender,
        ]);
        return $messageId = $result->get('MessageId');
    } catch (SesException $error) {
      return "err"; //$error->getAwsErrorMessage("")
    }

  }
}
