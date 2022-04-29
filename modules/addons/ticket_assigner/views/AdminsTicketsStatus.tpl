<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table id="myTable" class="table" style="font-size: larger">
    <thead class="table">
    <tr>
        <th>Admin Id</th>
        <th>Name</th>
        <th>Departments</th>
        <th>Assigned Tickets</th>
    </tr>
    </thead>
    <tr>
    {foreach $supportersDetails as $supporter}
        <td>$supporter['id']</td>
        <td>$supporter['name']</td>
                <td>$supporter['departments']</td>
                        <td>$supporter['numberOfTickets']</td>
    {/foreach}
    </tr>
</table>
</body>
</html>


