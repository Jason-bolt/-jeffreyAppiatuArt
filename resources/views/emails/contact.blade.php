<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link
        rel="stylesheet"
        href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css"
    />
    <source src="assets/bootstrap-5.0.2-dist/js/bootstrap.min.js"/>
    <source src="assets/bootstrap-5.0.2-dist/js/bootstrap.js"/>

    <style>
        body {
            background-color: #ebebeb;
        }

        .container {
            padding: 0 20%;

        }
    </style>
</head>
<body>

    <section class="container mt-5">
        <p class="display-1">JA</p>
        <div class="pt-3">
            <p><strong>Message From: </strong>{{ $contactData['first_name'] }} {{ $contactData['first_name'] }}</p>
            <p>{{ $contactData['email'] }}</p>
        </div>

        <div class="mt-4">
            <p class="h1">Subject: {{ $contactData['subject'] }}</p>
            <p>{{ $contactData['message'] }}</p>
        </div>
    </section>

</body>
</html>
