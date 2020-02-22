<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <!-- Styles -->
    </head>
    <body>
    <div class="container">
        <div class="row">
        <div class="col-md-6">
            <div  style="max-height: 600px; overflow-x: auto;">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>FULLNAME</th>
                        <th>ACTION</th>
                      </tr>
                    </thead>
                    <tbody id="data"> 
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <h2>Full Player Data</h2>
            <div id="fullData"></div>
        </div>
    </div>
    </div>

        <script src="/js/jquery.min.js"></script>
        <script>
            $(document).ready(function(e) {
                loadPlayers();
            });

            function loadPlayers() {
                $.ajax({
                    type: 'GET',
                    url: '/api/allPlayer',
                    success: function(result){
                        var tableRow = '';
                        $.each(result, function (key, value) { 
                            tableRow += '<tr><td>';
                            tableRow += value.id;
                            tableRow += '</td><td>';
                            tableRow += value.full_name;
                            tableRow += '<td><a href="#" onclick="retrieveData(this); return false" data-id='+ value.id +' class="btn btn-primary">VIEW</a>';
                            tableRow += '</td></tr>';  
                        }) 
                        $("tbody#data").html(tableRow);
                    }
                })
            }

            function retrieveData(data) { 
                var id = data.getAttribute("data-id");
                $.ajax({
                    type: 'GET',
                    url: '/api/player/' + id,
                    success: function(result){
                        var items = '';
                        items += '<ul>';
                        items += '<li> <b>ID:</b> ' + result.id + '</li>';
                        items += '<li> <b>FIRST NAME:</b> ' + result.first_name + '</li>';
                        items += '<li> <b>SECOND NAME:</b> ' + result.second_name + '</li>';
                        items += '<li> <b>FORM:</b> ' + result.form + '</li>';
                        items += '<li> <b>TOTAL POINTS:</b> ' + result.total_points + '</li>';
                        items += '<li> <b>INFLUENCE:</b> ' + result.influence + '</li>';
                        items += '<li> <b>CREATIVITY:</b> ' + result.creativity + '</li>';
                        items += '<li> <b>THREAT:</b> ' + result.threat + '</li>';
                        items += '<li> <b>ICT INDEX:</b> ' + result.ict_index + '</li>';
                        items += '</ul>';
                        $("#fullData").html(items);
                    }
                })
            }
        </script>
    </body>
</html>
