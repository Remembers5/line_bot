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

                    break;
                default:
                    error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }
            break;
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};
