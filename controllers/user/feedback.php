<?php

# [HANDLE]
// Nếu chưa check
if(!isset($_SESSION['temp']['result'])) route();
// Nếu gửi đánh giá
if(isset($_POST['sendBtn'])) {
    

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
                $_POST['point'],
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
    // On bool feedback
    $_SESSION['bool_feedback'] = true;
    route('feedback');
}

# [VIEW]
if(isset($_SESSION['bool_feedback'])) view('user','Kết quả đánh giá / Result','result_feedback',null);
view('user','Đánh giá / Feedback','feedback',null);