<?php
// ticket_submit.php
date_default_timezone_set("Asia/Seoul");

$customer = $_POST['customer'];
$items = $_POST['item'];

$total = 0;
$child_total_count = 0;
$adult_total_count = 0;
$details = [];

foreach ($items as $item) {
    $child_count = (int)$item['child_qty'];
    $adult_count = (int)$item['adult_qty'];
    $child_price = (int)$item['child_price'];
    $adult_price = (int)$item['adult_price'];

    $item_total = $child_count * $child_price + $adult_count * $adult_price;
    if ($child_count > 0 || $adult_count > 0) {
        $details[] = "{$item['name']} 어린이 {$child_count}명, 어른 {$adult_count}명";
    }

    $total += $item_total;
    $child_total_count += $child_count;
    $adult_total_count += $adult_count;
}

echo "<p>" . date("Y년 m월 d일 A g:i") . "</p>";
echo "<p><strong>{$customer}</strong> 고객님 감사합니다.</p>";

if ($child_total_count > 0) {
    echo "<p>어린이 입장권 {$child_total_count}매</p>";
}
if ($adult_total_count > 0) {
    echo "<p>어른 입장권 {$adult_total_count}매</p>";
}

foreach ($details as $d) {
    echo "<p>{$d}</p>";
}

echo "<p><strong>합계: " . number_format($total) . "원입니다.</strong></p>";
?>
