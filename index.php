<?php 
require_once('./LINEBotTiny.php');
$channelAccessToken = 'RlvjJ75b/Y6pZvkRubi439aOHnbo4DLIby0emSb7yHg0rvijrUwLIotURErm06Zo7/YO+xFacGJd2xwZfD+dOCmKguVOo8ZBBhhwBP4EW6lrfmbxw6ErquSTObl7fXrnNPARYpZpCiqWxzqp49xzOwdB04t89/1O/w1cDnyilFU=';
$channelSecret = '09be4e00415d8079d87f1a834165bb2b';
$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    "type"=>"imagemap",
                                    "baseUrl"=>"https://api.reh.tw/line/bot/example/assets/images/example/1040/",
                                    "altText"=>"This is an imagemap",
                                    "baseSize"=>array("height"=>768,"width"=>1024),
                                    "actions"=>array(
                                            array("type"=>"uri","linkUri"=>"https://example.com/","area"=>array("x"=>0,"y"=>0,"width"=>1024,"height"=>768)),
                                            array("type"=>"message","text"=>"Hello","area"=>array("x"=>512,"y"=>0,"width"=>1024,"height"=>768))
                                        )
                                )
                            )
                        ));
                    break;
                default:
                    error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }
            break;
        case 'postback':
            $message = $event['postback'];
            $client->replyMessage(array(
                'replyToken' => $event['replyToken'],
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => '這是postback->'.$message['data']
                    )
                )
            ));
            break;
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};


