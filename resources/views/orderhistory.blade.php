<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  @vite('resources/js/app.js')

</head>
    <body>
        <!--Put the header in here-->
        @extends('layouts.header')
        
        @include('layouts.sidebar')

        <!-- content -->
        
        <!-- end of content -->

    </body>
</html>