<?php

use Illuminate\Http\Request;

Route::middleware(['auth:api', 'msgfilter'])->group(function(){
    Route::post('/push_msg', 'UserMessageController@pushmsg');
});
