<!DOCTYPE html>
<html>
<head>
    <title>Upload CV</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        .container {
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            max-width: 400px;
            background-color: #f9f9f9;
        }

        h2 {
            margin-top: 0;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="file"] {
            margin: 10px 0;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload CV</h2>
        <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="resume">
            <button type="submit">Upload CV</button>
        </form>
    </div>
</body>
</html>
