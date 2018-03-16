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
                    if($message['text']=="確認"){
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    'type' => 'template',
                                    'altText' => 'this is a confirm template',
                                    'template'=> array( 'type'=>'confirm',
                                                        'text'=>'Are you sure?',
                                                        'actions'=>array(array('type'=>"message","label"=>"Yes","text"=>"yes"),array('type'=>"message","label"=>"No","text"=>"no"))
                                        )
                                )
                            )
                        ));
                    }elseif($message['text']=="按鈕") {
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    'type' => 'template',
                                    'altText' => 'This is a buttons template',
                                    'template'=> array( 'type'=>'buttons',
                                                        'thumbnailImageUrl'=>'https://www.pkstep.com/wp-content/uploads/2015/09/LINE@tech1.png',
                                                        'imageAspectRatio'=>'rectangle',
                                                        'imageSize'=>'cover',
                                                        'imageBackgroundColor'=>'#FFFFFF',
                                                        'title'=>'Menu',
                                                        'text'=>'Please select',
                                                        'defaultAction'=>array('type'=>'uri','label'=>'View detail','uri'=>'https://www.google.com.tw'),
                                                        'actions'=>array(array('type'=>'postback','label'=>'php','data'=>'action=php&id=php'),
                                                                        array('type'=>'message','label'=>'java','text'=>'java'),
                                                                        array('type'=>'uri','label'=>'python','uri'=>'https://www.google.com.tw')
                                                                    )
                                        )
                                )
                            )
                        ));
                    }elseif ($message['text']=="傳送") { 
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
                                                                            "actions"=>array(array( "type"=>"postback", "label"=>"php", "data"=>"action=php&id=php"),
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
                    }elseif ($message['text']=="傳送2") {
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                                array(
                                                    'type'=>'template',
                                                    'altText'=>'this is a image carousel template',
                                                    'template'=>array(
                                                           'type'=>'image_carousel',
                                                           'columns'=>array(
                                                                        array('imageUrl'=>'https://snowplowanalytics.com/assets/img/blog/2016/09/python-logo.png','action'=>array('type'=>'postback','label'=>'python','data'=>'action=python&id=python')),
                                                                        array('imageUrl'=>'https://upload.wikimedia.org/wikipedia/zh/8/88/Java_logo.png','action'=>array('type'=>'message','label'=>'java','text'=>'java')),
                                                                        array('imageUrl'=>'https://www.foolegg.com/wp-content/uploads/2012/06/php.png','action'=>array('type'=>'uri','label'=>'php','uri'=>'http://example.com/page/222'))
                                                                )
                                                    )
                                                )
                            )
                        ));
                    }else{
                        /*
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    'type' => 'text',
                                    'text'=>$message['text']
                                    //'text' => $event['source']['userId']
                                )
                            )
                        ));
                        */
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    "type"=>"imagemap",
                                    "baseUrl"=>"https://snowplowanalytics.com/assets/img/blog/2016/09/python-logo.png",
                                    "altText"=>"This is an imagemap",
                                    "baseSize"=>array("height"=>1040,"width"=>1040),
                                    "actions"=>array(
                                            array("type"=>"uri","linkUri"=>"https://example.com/","area"=>array("x"=>0,"y"=>0,"width"=>520,"height"=>1040)),
                                            array("type"=>"message","text"=>"Hello","area"=>array("x"=>520,"y"=>0,"width"=>520,"height"=>1040)),
                                        )
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


