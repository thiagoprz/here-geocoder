<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Here Geocoder</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .modal-body {
            height: 450px !important;
            overflow: auto !important;
            text-align: left !important;
        }
    </style>

    <script src="https://rawgit.com/abodelot/jquery.json-viewer/master/json-viewer/jquery.json-viewer.js"></script>
    <link href="https://rawgit.com/abodelot/jquery.json-viewer/master/json-viewer/jquery.json-viewer.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB2aWV3Qm94PSIwIDAgMjgzLjQ2IDI1OS4xMSI+PGRlZnM+PHN0eWxlPi5jbHMtMXtmaWxsOm5vbmU7fS5jbHMtMntjbGlwLXBhdGg6dXJsKCNjbGlwLXBhdGgpO30uY2xzLTN7ZmlsbDojNDhkYWQwO30uY2xzLTR7ZmlsbDojMzgzYzQ1O308L3N0eWxlPjxjbGlwUGF0aCBpZD0iY2xpcC1wYXRoIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwIDApIj48cmVjdCBjbGFzcz0iY2xzLTEiIHdpZHRoPSIyODMuNDYiIGhlaWdodD0iMjU5LjExIi8+PC9jbGlwUGF0aD48L2RlZnM+PHRpdGxlPkhFUkUgTG9nbyAtIEdyZXkgUkdCPC90aXRsZT48ZyBpZD0iTGF5ZXJfMiIgZGF0YS1uYW1lPSJMYXllciAyIj48ZyBpZD0iTGF5ZXJfMS0yIiBkYXRhLW5hbWU9IkxheWVyIDEiPjxnIGlkPSJIRVJFX0xvZ29fLV9HcmV5X1JHQiIgZGF0YS1uYW1lPSJIRVJFIExvZ28gLSBHcmV5IFJHQiI+PGcgY2xhc3M9ImNscy0yIj48cG9seWdvbiBjbGFzcz0iY2xzLTMiIHBvaW50cz0iMCAyMjAuMDEgMzkuMTEgMjU5LjEyIDM5LjExIDI1OS4xMiA3OC4yMiAyMjAuMDEgMCAyMjAuMDEiLz48ZyBjbGFzcz0iY2xzLTIiPjxwYXRoIGNsYXNzPSJjbHMtNCIgZD0iTTEzNS4zNiwxMzEuMTljLTguMTctOS43LTcuNzgtMTQuOTMtMi43MS0yMCw2LjE1LTYuMTMsMTIuMzgtMy41NCwxOS4zNywzLjI2Wk0yMTkuMDksMjQuODNjNi4xNS02LjEzLDEyLjM4LTMuNTQsMTkuMzcsMy4yNkwyMjEuNzcsNDQuNzhjLTguMTctOS43LTcuNzUtMTQuODktMi42OC0xOS45NG01MC41NSwxN0MyNjIsNTMuMjQsMjQ4Ljg1LDcxLjY2LDIzNSw1Ny43OWwzNS4xLTM1LjFjLTMuMTUtMy4zNy01LjU0LTYuMTktNy4zNy04LTE4LjkyLTE5LTQwLjI0LTE5LjIyLTU3LTIuNTYtMTEuMTcsMTEuMTMtMTQuMDksMjMuODgtMTAuODQsMzZsLTExLTEyLjUyYy0zLjE4LDEuNzYtMTYuNjYsMTMuNjItNi41NiwzMS41N0wxNjQuNzcsNTYuNjgsMTQ4LjA1LDczLjM0bDIyLjU3LDIyLjU3Yy0xNy40NC0xMy44NC0zNi4yMy0xMi40OC01MS4zMSwyLjU2LTE2LjE1LDE2LjEtMTUsMzUuNjEtMi45Miw1MS42N0wxMTQsMTQ3LjczQzk4LDEzMS43OCw4MC42NywxMzcuNDEsNzIuMDksMTQ2Yy02LjYyLDYuNjMtMTAuNjksMTUuNzUtOSwyMi4wOEwyOC40NCwxMzMuNDMsMTAsMTUxLjgzLDc4LjIyLDIyMGgzNi42TDkwLjI1LDE5NS40NGMtMTIuOS0xMy4xMi0xMy4xMy0yMC4wNy02Ljg1LTI2LjMsNi02LDEzLjA3LTIuMjcsMjUuNDUsMTAuMDhsMjQuMjgsMjQuMjcsMTguMy0xOC4zLTIzLTIzYzE2LjYxLDEyLjU2LDM2LjUxLDEzLjIzLDU0LjI2LTQuNDdsLjMxLS4zM2gwQzE5My44NSwxNDcuMjksMTk3LDEzNy41MiwxOTcsMTM3LjUybC0xMy44My05LjI5Yy03LjYyLDExLjM4LTIwLjc2LDI5Ljg0LTM0LjY0LDE2TDE4My43NCwxMDksMjA1LjY2LDEzMWwxOS4xMi0xOS4xMkwxOTcuMzUsODQuNGMtMTIuODItMTIuODItNS4yMi0yNC44NS4xMS0yOS4zOGE1NC4zMSw1NC4zMSwwLDAsMCwxMC43OSwxNWMxNy43NCwxNy43OSw0MC42NywyMS4zOCw2MC44MywxLjI3bC4zMi0uMzNoMGMxMC44OC0xMC4wNiwxNC4wNi0xOS44NCwxNC4wNi0xOS44NFoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKDAgMCkiLz48L2c+PC9nPjwvZz48L2c+PC9nPjwvc3ZnPgo="
                 width="34" height="34">
            Here Geocoder
        </div>


        @if (env('HERE_API_ID') && env('HERE_APP_CODE'))
            <form method="post">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Address..." aria-label="Address"
                           aria-describedby="button-address" name="address">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary"  type="submit" id="button-address">Search</button>
                    </div>
                </div>
            </form>
            <div class="modal fade" id="modalGeocoder" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Search Result</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <pre id="json-renderer"></pre>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-danger" role="alert">
                Missing configuration. See <a href="https://github.com/thiagoprz/here-geocoder" target="_blank">README.md</a>.
            </div>
        @endif

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#button-address', function () {
            $(this).attr('disabled', true);
            $.ajax({
                url: $('form').attr('action'),
                method: 'post',
                dataType: 'json',
                data: $('form').serialize(),
                complete: function (response, status) {
                    if (status == 'success') {
                        var data = response.responseJSON;
                        var options = {
                            collapsed: false,
                            rootCollapsable: true,
                            withQuotes: false,
                            withLinks: true
                        };
                        $('#json-renderer').jsonViewer(data, options);
                        $('#modalGeocoder').modal('show');
                    } else {
                        alert('Geolocation didn\'t work. Check your configuration');
                    }
                    $(this).removeAttr('disabled');
                }
            });
            return false;
        });
    })
</script>
</body>
</html>
