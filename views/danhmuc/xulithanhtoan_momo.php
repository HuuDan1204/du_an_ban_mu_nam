<?php
header('Content-type: text/html; charset=utf-8');

function execPostRequest($url, $data)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data))
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    // Execute post
    $result = curl_exec($ch);
    // Close connection
    curl_close($ch);
    return $result;
}

$endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

$partnerCode = 'MOMOBKUN20180529';
$accessKey = 'klm05TvNBzhg7h7j';
$secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa'; // Đảm bảo biến này được khai báo đúng
$orderInfo = "Thanh toán qua MoMo";
$amount = "10000"; // Số tiền thanh toán
$orderId = time() . ""; // ID đơn hàng
$redirectUrl = "http://localhost/du_an_ban_mu_nam/"; // URL chuyển hướng sau khi thanh toán
$ipnUrl = "http://localhost/du_an_ban_mu_nam/"; // URL thông báo IPN
$extraData = ""; // Dữ liệu bổ sung

$requestId = time() . "";
$requestType = "captureWallet";

// Before sign HMAC SHA256 signature
$rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
$signature = hash_hmac("sha256", $rawHash, $secretKey); // Sử dụng biến secretKey đúng

$data = array(
    'partnerCode' => $partnerCode,
    'partnerName' => "Test",
    "storeId" => "MomoTestStore",
    'requestId' => $requestId,
    'amount' => $amount,
    'orderId' => $orderId,
    'orderInfo' => $orderInfo,
    'redirectUrl' => $redirectUrl,
    'ipnUrl' => $ipnUrl,
    'lang' => 'vi',
    'extraData' => $extraData,
    'requestType' => $requestType,
    'signature' => $signature
);

$result = execPostRequest($endpoint, json_encode($data));
$jsonResult = json_decode($result, true); // Decode json

// Kiểm tra kết quả trả về
if (isset($jsonResult['payUrl'])) {
    header('Location: ' . $jsonResult['payUrl']);
    exit; // Đảm bảo thoát sau khi chuyển hướng
} else {
    // Xử lý lỗi nếu không có payUrl
    echo "Có lỗi xảy ra: " . (isset($jsonResult['message']) ? $jsonResult['message'] : 'Không có thông tin lỗi.');
}
?>