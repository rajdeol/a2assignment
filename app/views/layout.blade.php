<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>A2 consultant Responsive Assignment</title>
        <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
        {{HTML::script('js/jquery.validate.min.js')}}
        {{HTML::style('css/reset.css')}}
        {{HTML::style('css/style.css')}}
    </head>
    <body>
        <div class="main-container">
        @yield('content')
        </div>
         {{HTML::script('js/contact.js')}}
    </body>
</html>