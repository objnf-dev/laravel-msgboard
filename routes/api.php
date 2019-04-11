<?php

Route::middleware(['auth:api', 'auth', 'msgfilter'])->group(function(){
    Route::post('/push_msg', 'UserMessageController@pushmsg');
});
