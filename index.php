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
                                                        'actions'=>array(array('type'=>'postback','label'=>'Buy','data'=>'action=buy&itemid=123'),
                                                                        array('type'=>'message','label'=>'Add to cart','text'=>'Add to cart'),
                                                                        array('type'=>'uri','label'=>'View detail','uri'=>'https://www.google.com.tw')
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
                                                    "columns"=>array(array( "thumbnailImageUrl"=>"https://example.com/bot/images/item1.jpg",
                                                                            "imageBackgroundColor"=>"#FFFFFF",
                                                                            "title"=>"this is menu",
                                                                            "text"=>"description",
                                                                            "defaultAction"=>array( "type"=>"uri",
                                                                                                    "label"=>"View detail",
                                                                                                    "uri"=>"http://example.com/page/123"
                                                                                                ),
                                                                            "actions"=>array(array( "type"=>"postback", "label"=>"Buy", "data"=>"action=buy&itemid=111"),
                                                                                            array(  "type"=>"postback", "label"=>"Add to cart", "data"=>"action=add&itemid=111"),
                                                                                            array(  "type"=>"uri", "label"=>"View detail", "uri"=>"http://example.com/page/111"),
                                                                                        ),
                                                                    ),array( "thumbnailImageUrl"=>"https://example.com/bot/images/item2.jpg",
                                                                            "imageBackgroundColor"=>"#000000",
                                                                            "title"=>"this is menu",
                                                                            "text"=>"description",
                                                                            "defaultAction"=>array( "type"=>"uri",
                                                                                                    "label"=>"View detail",
                                                                                                    "uri"=>"http://example.com/page/222"
                                                                                                ),
                                                                            "actions"=>array(array( "type"=>"postback", "label"=>"Buy", "data"=>"action=buy&itemid=222"),
                                                                                            array(  "type"=>"postback", "label"=>"Add to cart", "data"=>"action=add&itemid=222"),
                                                                                            array(  "type"=>"uri", "label"=>"View detail", "uri"=>"http://example.com/page/222"),
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
                                                                        array('imageUrl'=>'https://example.com/bot/images/item1.jpg','action'=>array('type'=>'postback','label'=>'buy','data'=>'action=buy&itemid=111')),
                                                                        array('imageUrl'=>'https://example.com/bot/images/item2.jpg','action'=>array('type'=>'message','label'=>'Yes','text'=>'yes')),
                                                                        array('imageUrl'=>'http://img.hb.aicdn.com/d6e63001b0d36524a426152cb169d6c58dad46db581f-DWAEI0_fw658','action'=>array('type'=>'uri','label'=>'View detail','uri'=>'http://example.com/page/222'))
                                                                )
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
                                    'text' => $message['text']
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
                        'text' => '這是postback'.$message['data']
                    )
                )
            ));
            break;
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};
