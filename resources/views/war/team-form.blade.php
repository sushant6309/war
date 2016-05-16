@extends('layouts.layout')

@section('CSS')

@stop

@section('content')
    <header class="intro-header" style="background-image: url('{{asset('assets/img/contact-bg.jpg')}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>Fill the damn Form</h1>
                        <hr class="small">
                        <span class="subheading">So its you who want a war.(Houston look we have a Loki with us)</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">

        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div id="form">
                <p>Just think again atleast once before moving forward</p>
                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->

                    {!! Form::open(['route'=>'war.get.data', 'method'=>'Post', 'id'=>'war_form']) !!}
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Name (First Team)</label>
                            <input type="text" class="form-control" placeholder="Name (First Team)" id="team_one" name="team_one" required data-validation-required-message="Please enter your team name.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Name (Second Team)</label>
                            <input type="text" class="form-control" placeholder="Name (Second Team)" id="team_two" name="team_two" required data-validation-required-message="Please enter your other team name.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Number of Soldiers</label>
                            <input type="text" class="form-control" placeholder="Number of Soldiers" id="no_of_soldiers" name="no_of_soldiers" required data-validation-required-message="Please enter no of soldiers.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="button" id="submit_war" class="btn btn-default">Send</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <hr>
@stop

@section('JS')
<script>
    var form = $('#form');
    $('#submit_war').click(function(e){
        e.preventDefault();
        $.ajax({
            "url":'{{route('war.get.data')}}',
            "data":$('#war_form').serializeArray(),
            "method":'Post',
            "beforeSend":function(){
                form.html('');
                form.html('<p> Wait while we load the War that you started </p>')
            }
        }).success(function(responce){
            if(responce.status == 'OK')
            {
               form.html('');
                form.html('<div> <p> Team Won :'+responce.matchWon+' </div><br>' +
                        '<div><p>Commentary :'+responce.messages+' </p></div>')

            }else{
                alert('Dude what is going on');
            }
        });
    });
</script>
@stop
