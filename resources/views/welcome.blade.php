@extends('layouts.app')
@section('content')

<div id='msg-board' v-bind:style="MsgBoardStyle">
    
    <msg-input v-model="usermsgdata"></msg-input>
    <submit-button v-bind:style="MsgSubmitButtonStyle"></submit-button>
</div>


@endsection