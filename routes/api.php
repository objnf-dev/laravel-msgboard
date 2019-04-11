<?php

Route::middleware(['auth:api', 'auth', 'msgfilter']) -> post('/push_msg', 'UserMessageController@pushmsg');

Route::middleware(['auth:api', 'auth']) -> post('/get_msg', 'GetMessageController@getOldMsg');
