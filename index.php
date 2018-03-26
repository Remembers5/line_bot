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
                    if ($message['text']=="Carousel") { 
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                    array(  "type"=>"template",
                                            "altText"=>"this is a carousel template",
                                            "template"=>array(  "type"=>"carousel",
                                                    "columns"=>array(array( "thumbnailImageUrl"=>"https://upload.wikimedia.org/wikipedia/zh/8/88/Java_logo.png",
                                                                            "imageBackgroundColor"=>"#FFFFFF",
                                                                            "title"=>"this is menu",
                                                                            "text"=>"description",
                                                                            "defaultAction"=>array( "type"=>"uri",
                                                                                                    "label"=>"View detail",
                                                                                                    "uri"=>"http://example.com/page/123"
                                                                                                ),
                                                                            "actions"=>array(array( "type"=>"postback", "label"=>"php","text": "php","data"=>"action=php&id=php"),
                                                                                            array(  "type"=>"postback", "label"=>"java", "data"=>"action=java&id=java"),
                                                                                            array(  "type"=>"uri", "label"=>"python", "uri"=>"http://example.com/page/111"),
                                                                                        ),
                                                                    ),array( "thumbnailImageUrl"=>"https://snowplowanalytics.com/assets/img/blog/2016/09/python-logo.png",
                                                                            "imageBackgroundColor"=>"#000000",
                                                                            "title"=>"this is menu",
                                                                            "text"=>"description",
                                                                            "defaultAction"=>array( "type"=>"uri",
                                                                                                    "label"=>"View detail",
                                                                                                    "uri"=>"http://example.com/page/222"
                                                                                                ),
                                                                            "actions"=>array(array( "type"=>"postback", "label"=>"python", "data"=>"action=python&id=python"),
                                                                                            array(  "type"=>"postback", "label"=>"java", "data"=>"action=java&id=java"),
                                                                                            array(  "type"=>"uri", "label"=>"php", "uri"=>"https://www.foolegg.com/wp-content/uploads/2012/06/php.png"),
                                                                                        ),
                                                                    )
                                                            ),
                                                    "imageAspectRatio"=>"rectangle",
                                                    "imageSize"=>"cover"
                                            )
                                        )
                            )
                        ));
                    }else{
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    'type' => 'text',
                                    'text'=>$event['text']
                                )
                            )
                        ));
                        
                    }
                    break;
                default:
                    error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }
            break;
        case 'postback':
            $postback = $event['postback'];
            $client->replyMessage(array(
                'replyToken' => $event['replyToken'],
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => serialize($event)
                    )
                )
            ));
            break;
        default:
            break;
    }
};
