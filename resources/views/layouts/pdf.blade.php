<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <title>X Y Z</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Invoicebus Invoice Template">
    <meta name="author" content="Invoicebus">

    <meta name="template-hash" content="baadb45704803c2d1a1ac3e569b757d5">

    <link rel="stylesheet" href="public/css/template2.css">

</head>

<body style="font-family: 'Amiri', sans-serif">
<div id="container" >
    <section id="memo">
        @php
            $information=\App\Models\Information::all()->first();
        @endphp
        <div class="logo">
            <img src="public/img/Profile1.png" width="200px">
        </div>

        <div class="company-info">
            <br>
            <span>Address : {{$information->location}}</span>
            <br>
            <span>Phone : {{$information->phone}}</span>
            <br>
            <span>Email : {{$information->email}}</span>
        </div>

    </section>
    @yield('content')
</div>
</body>
</html>
