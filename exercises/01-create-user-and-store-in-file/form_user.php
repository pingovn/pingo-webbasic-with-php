<html>
    <head>
        <title></title>
    </head>
    <style type="text/css">
        label {
            display: inline-block;
            width: 100px;
        }
    </style>
    <body>
        <form
            action="create_user.php"
            method="post"
            >
            <label for="fullname">Username: </label>
            <input type="text" id="fullname" name="fullname" />
            <br />
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" />
            <br />
            <label for="age">Age:</label>
            <input type="text" name="age" id="age" />
            <br />
            <label for="gender">Gender</label>
            <select id="gender" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <br />
            <br />
            <label for="submit"></label>
            <input id="submit" type="submit" value="Register" name="submit" />
        </form>
    </body>
</html>