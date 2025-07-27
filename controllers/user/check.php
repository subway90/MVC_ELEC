<?php

require 'vendor/autoload.php'; // Tải thư viện Google API

// Khởi tạo Google Client
$client = new Google_Client();
$client->setApplicationName('Google Sheets API PHP');
$client->setScopes(Google_Service_Sheets::SPREADSHEETS);
$client->setAuthConfig(SHEET_JSON_FILE);
$client->setAccessType('offline');
$service = new Google_Service_Sheets($client);

# [VARIABLE]

# [HANDLE]

// get input
if(isset($_POST['input_name']) && $_POST['input_name']) $input_name = mb_strtolower($_POST['input_name'],'UTF-8');
// toast error
else {
    toast_create('danger','VUI LÒNG NHẬP SỐ ĐIỆN THOẠI QUÝ KHÁCH / PLEASE ENTER YOUR PHONE NUMBER');
    route();
}

// save input
$_SESSION['temp']['input'] = $input_name;




// condition call API : null data OR time query < duration time
if(empty($_SESSION['data']) || (time() - $_SESSION['temp']['time']) > 30) {

    // call API get data from GG Sheet
    try {
        // query get
        $response = $service->spreadsheets_values->get(SHEET_ID, 'Info!A2:F');
        
        // get values
        $_SESSION['data'] = $response->getValues(); 

        // checks exist
        if (empty($_SESSION['data'])) {
            toast_create('danger', 'Không có dữ liệu nào được tìm thấy. / No data found, try later.');
            route();
        }

        // save time call API
        $_SESSION['temp']['time'] = time();

    }
    catch (Google_Service_Exception $e) {
        // error 429: too many request in time
        if ($e->getCode() == 429) {
            toast_create('danger', 'Vui lòng thử lại sau 1 phút / Please try again in 1 minute');
            route();
        }
    }
}

// handle check
foreach ($_SESSION['data'] as $row) {
    // reset old result & roomate
    $_SESSION['temp']['result'] = null;
    $_SESSION['temp']['roomate'] = null;
    // find input
    if($input_name === $row[1]) {
        // save in session temp
        $_SESSION['temp']['result'] = $row;

        // find together
        foreach ($_SESSION['data'] as $row_2) {
            // cùng phòng, khác tên
            if($row_2[4] == $_SESSION['temp']['result'][4] && $row_2[0] !== $_SESSION['temp']['result'][0])
            $_SESSION['temp']['roomate'][] = $row_2;
        }
        // kết thúc vòng lặp find input
        break;
    }
}

// route
if(empty($_SESSION['temp']['result'])) {
    toast_create('danger','Không tìm thấy thông tin của tên này / No information found for this name');
    route();
}else {
    route('result');
}