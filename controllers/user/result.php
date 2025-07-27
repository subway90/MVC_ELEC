<?php

# [HANDLE]

// check validate
if(empty($_SESSION['temp']['result'])) route();


# [RENDER]
view('user','Kết quả','result',null);