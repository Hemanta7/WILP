<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Access Denied</title>
</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');

        .wrapper {
            height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
			flex-direction: column;
        }
		h1{
			font-size: 30px;
			font-family: 'Montserrat', sans-serif;
		}
		button{
			outline: none;
			padding: 10px 15px;
			border: none;
			background: #444;
			color: #fff;
			cursor: pointer;
			/* display: inline-block; */
		}
    </style>
    <div class="wrapper">
        <h1>You dont have access to view this page</h1>
		<a href="{{ url('/') }}"><button>Go Back Home</button></a>
    </div>
</body>

</html>
