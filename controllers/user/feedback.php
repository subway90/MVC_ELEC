<?php

# [HANDLE]

if(isset($_POST['sendBtn'])) {
    
    // test_array([
    //     $_POST,
    //     $_SESSION['temp']['result'][0],
    //     date('H:i:s d/m/Y')
    // ]);

    require 'vendor/autoload.php'; // Tải thư viện Google API

    // Khởi tạo Google Client
    $client = new Google_Client();
    $client->setApplicationName('Google Sheets API PHP');
    $client->setScopes(Google_Service_Sheets::SPREADSHEETS);
    $client->setAuthConfig(SHEET_JSON_FILE);
    $client->setAccessType('offline');

    $service = new Google_Service_Sheets($client);

    // input
    $point = $_POST['point'];
    $content = $_POST['content'];

    // Thêm dữ liệu vào cột mới nhất
    $body = new Google_Service_Sheets_ValueRange([
        'values' => [
            [
                $_SESSION['temp']['result'][0],
                $_POST['point']+1,
                $_POST['content'],
                date('H:i:s d/m/Y')
            ]
        ]
    ]);
    
    // Ghi dữ liệu vào Google Sheets
    $params = [
        'valueInputOption' => 'RAW' // Chọn kiểu nhập dữ liệu
    ];
    
    $result = $service->spreadsheets_values->append(SHEET_ID, 'Feedback', $body, $params);
    route('result');
    toast_create('success','Đánh giá của bạn đã được gửi đi / Feedback has been send !');
}

# [DATA]
$data = [

];

# [VIEW]
view('user','Đánh giá / Feedback','feedback',$data);