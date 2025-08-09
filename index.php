<?php
# [FILE]
require_once 'autoload.php';


# [DEPLOY]
if(get_action_uri(0) == 'deploy-src') controller('user','deploy-src');

# [BOOL ACTIVE]
// view_error(404);

# [ACTION]
if ($action = get_action_uri(0)) controller('user',$action);

# [DEFAULT]
controller('user','home');