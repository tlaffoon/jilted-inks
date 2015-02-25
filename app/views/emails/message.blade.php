<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <style type="text/css">

        .header {
            font-size: 16px;
        }

        .content-box {
            border: dashed #eee 1px;
            padding: 15px;
            margin-top: 20px;
        }

        .content {
            text-indent: 15px;
            font-size: 14px;
        }

        </style>
    </head>
    <body>
        <h2>Blog Contact Form</h2>

        <div class="header">
            <h4>From: <strong>{{ $name }}</strong></h4>
            <h4>Email: <strong>{{ $email }}</strong></h4>
        </div>
        

        <div class="content-box">
            <p class="content"> {{ $content }} </p>
        </div>


    </body>
</html>