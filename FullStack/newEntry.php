<html>
<head>
    <title>New Entry</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <meta name="viewport" content="initial-scale=1.0">
    <link rel="icon" href="top.png">
    <meta charset="utf-8">

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #AFDB88;
        }
    </style>
</head>
<body>
<div class="jumbotron" style = "margin-right: 10%;margin-left: 10%; margin-top: 50px">
    <h1 class="display-4"> Add a New Lab </h1>
    <hr class="my-4">
    <h3>Please enter the Lab Details</h3>
</div>

<form style="margin-right: 20%;margin-left: 20%; margin-top: 50px" action="login.php" method="POST">
    <div class="form-group">
        <label for="title">Enter the Lab Name</label>
        <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
        <label for="category">Enter a Category</label>
        <input type="text" class="form-control" id="category" placeholder="category" name="category">
    </div>
    <div class="form-group">
        <label for="privacy">Select list:</label>
        <select class="form-control" id="privacy">
            <option>Public</option>
            <option>Private</option>
        </select>
    </div>
    <div class="form-group">
        <label for="address">What is the Address?</label>
        <input type="text" class="form-control" id="address" placeholder="address" name="address">
    </div>
    <div class="form-group">
        <label for="city">Which City is this located in?</label>
        <input type="text" class="form-control" id="city" placeholder="city" name="city">
    </div>
    <div class="form-group">
        <label for="city">Which Country is this located in?</label>
        <input type="text" class="form-control" id="country" placeholder="country" name="country">
    </div>
    <button type="submit" class="btn btn-light">Submit</button>
</form>
</body>
</html>