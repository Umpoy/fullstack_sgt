<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="initial-scale=1, user-scalable=no">
    <title>Student Grade Table</title>
</head>
<body>
<div class="container">
<a href="logout.php" id="logout" class="btn btn-danger">Logout</a>
    <div class="page-header">
        <!-- only show this element when the isnt on mobile -->
        <h1 class="hidden-xs">Student Grade Table
            <small class="pull-right">Grade Average : <span class="label label-default avgGrade"></span></small>
        </h1>
        <!-- only show this element when the user gets to a mobile version -->
        <h3 class="visible-xs">Student Grade Table
            <small class="pull-right">Grade Average : <span class="label label-default avgGrade"></span></small>
        </h3>
    </div>
    <div class="student-add-form col-md-3 pull-right">
        <h4>Add Student</h4>
        <div class="form-group input-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-user"></span>
            </span>
            <input type="text" class="form-control" name="studentName" id="studentName" placeholder="Student Name">
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-list-alt"></span>
            </span>
            <input type="text" class="form-control" name="course" id="course"
                placeholder="Student Course">
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-education"></span>
            </span>
            <input type="text" class="form-control" name="studentGrade" id="studentGrade"
                placeholder="Student Grade">
        </div>
        <button type="button" class="btn btn-success btn-block add">Add</button>
        <button type="button" class="btn btn-default cancel btn-block">Cancel</button>
        <button type="button" class="btn btn-info getData btn-block">Get Data From Server</button>
    </div>
    <div class="col-xs-12 student-list-container col-md-9">
        <table class="student-list table table-hover">
            <thead>
            <tr>
                <th>Student Name</th>
                <th>Student Course</th>
                <th>Student Grade</th>
                <th>Operations</th>
            </tr>
            </thead>
            <tbody>
                <!-- table data will show where -->
            </tbody>
        </table>
    </div>
</div>
</body>
</html>