<?php

require __DIR__."/../vendor/autoload.php";


$client = \Elasticsearch\ClientBuilder::create ()->build ();

// 从网上找的去掉 html 标签的试题的文本
// 当然实际使用场景中，这里需要连接数据库，获取数据
$questions = [
    "的绝对值等于（  ）",
    "截止到2008年5月19日，已有21600名中外记者成为北京奥运会的注册记者,创历届奥运会之最．将21600用科学记数法表示应为",
    "若两圆的半径分别是1cm和5cm，圆心距为6cm，则这两圆的位置关系是（  ）",
    "众志成城，抗震救灾．某小组7名同学积极捐出自己的零花钱支援灾区，他们捐款数额分别是（单位：元）：50，20，50，30，50，25，135．这组数据的众数和中位数分别是",
    "若一个多边形的内角和等于，则这个多边形的边数是",
    "如图，有5张形状、大小、质地均相同的卡片，正面分别印有北京奥运会的会徽、吉祥物（福娃）、火炬和奖牌等四种不同的图案，背面完全相同．现将这5张卡片洗匀后正面向下放在桌子上，从中随机抽取一张，抽出的卡片正面图案恰好是吉祥物（福娃）的概率是（  ）",
    "若，则xy的值为",
    "已知O为圆锥的顶点，M为圆锥底面圆上一点，点P在OM上．一只蜗牛从P点出发，绕圆锥侧面爬行，回到P点时所爬过的最短路线的痕迹如右图所示．若沿OM将圆锥侧面剪开并展平，所得侧面展开图是",
];
$counter = 0;
foreach($questions as $key => $question){
    $params['body'][] = [
        'index' => [
            '_index' => 'es-test',
            '_type' => 'test',
        ]
    ];

    $params['body'][] =  [
        'id' => $key,
        'content' => $question
    ];
    $counter++;
    // Every 1000 documents stop and send the bulk request
    if ($counter % 100 == 0) {
        $responses = $client->bulk($params);
        // erase the old bulk request
        $params = ['body' => []];
        // unset the bulk response when you are done to save memory
        unset($responses);
    }
}
// Send the last batch if it exists
if (!empty($params['body'])) {
    $responses = $client->bulk($params);
}