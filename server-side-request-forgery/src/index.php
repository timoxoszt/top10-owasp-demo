<!DOCTYPE html>
<html>
<head>
    <title>View Medium Blog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <center>
        <h1>Medium URL</h1>
        <img src="medium.png" alt="medium logo" style="height:100px">
    </center>
    
    <form class="mb-3" action="view.php" method="GET">
        <div class="input-group">
            <input type="text" class="form-control" name="url" placeholder="URL..." required>
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
