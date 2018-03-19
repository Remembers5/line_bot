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
                'type' => 'imagemap', // 訊息類型 (圖片地圖)
                'baseUrl' => 'https://tidal-velocity-196003.appspot.com', // 圖片網址 (可調整大小 240px, 300px, 460px, 700px, 1040px)
                'altText' => 'Example imagemap', // 替代文字
                'baseSize' => array(
                    'height' => 1040, // 圖片寬
                    'width' => 1040 // 圖片高
                ),
                'actions' => array(
                    array(
                        'type' => 'uri', // 類型 (網址)
                        'linkUri' => 'https://github.com/GoneTone/line-example-bot-php', // 連結網址
                        'area' => array(
                            'x' => 0, // 點擊位置 X 軸
                            'y' => 0, // 點擊位置 Y 軸
                            'width' => 520, // 點擊範圍寬度
                            'height' => 1040 // 點擊範圍高度
                        )
                    ),
                    array(
                        'type' => 'message', // 類型 (用戶發送訊息)
                        'text' => 'Hello', // 發送訊息
                        'area' => array(
                            'x' => 520, // 點擊位置 X 軸
                            'y' => 0, // 點擊位置 Y 軸
                            'width' => 520, // 點擊範圍寬度
                            'height' => 1040 // 點擊範圍高度
                        )
                    )
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


