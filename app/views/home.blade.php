@extends('layout')
@section('content')
<header>
    <div class="greybox header-left-box"></div>
    <div class="greybox header-right-box">
        <input type="button" id="contact_us_click" value="Contact us" />
    </div>
    <div class="clear"></div>
</header>
<section class="banner">
    <div class="greybox banner-div"></div>
</section>
<section class="middle">
    <div class="greybox middle-left-div"></div>
    <div class="greybox middle-right-div"></div>
    <div class="clear"></div>
</section>
<section class="footer">
    <div class="greybox footer-left-div"></div>
    <div class="greybox footer-right-div"></div>
    <div class="clear"></div>
</section>
<div class="clear"></div>
<div id='overlay'></div>
<div id='modal'>
    <div id="content">
        <div id="form_outer">
        {{ Form::open(array('action' => 'HomeController@saveContactUs','class'=>'contact_form','id'=>'contact_form'))}}
        <ul>
            <li>
             <h2>Contact Us</h2>
             <span class="required_info">* Denotes Required Field</span>
            </li>
            <li>
        {{ Form::label('name', '* Name') }}
        {{ Form::text('name',null,array('placeholder' => 'John Doe')) }}
            </li>
            <li>
        {{ Form::label('email', '* E-Mail') }}
        {{ Form::email('email',null,array('placeholder' => 'john_doe@example.com')) }}
            </li>
            <li>
        {{ Form::label('phone', 'Phone Number') }}
        {{ Form::number('phone',null,array('placeholder' => '4517151515')) }}
            </li>
            <li>
        {{ Form::label('contact_method', '* Contact Method') }}
        {{ Form::select('contact_method', array('phone' => 'phone', 'email' => 'email')) }}
            </li>
            <li>
        {{ Form::label('enquiry', '* Enquiry Info') }}
        {{ Form::textarea('enquiry') }}
            </li>
            <li>
        {{ Form::label('invoice_number', 'Invoice Number') }}
        {{ Form::number('invoice_number') }}
            </li>
            <li>
        {{ Form::button('Submit',array('class' => 'submit','id' => 'submit_form')) }}
            </li>
        </ul>
        {{ Form::close() }}
        </div>
        <div id="loading">
        Please wait enquiry is submitting ...
    </div>
    </div>
    <a id="close" href="#">close</a>
</div>
@stop