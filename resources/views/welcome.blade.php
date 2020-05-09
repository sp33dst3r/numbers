<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

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
            .error{
                color: red;
            }
            form{
                border: none;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Получение кадастровых данных</h1>
            <form action="">
                <div class="form-group">
                    <label for="numbers">Кадастровые номера</label>
                    <input type="text" id="numbers" class="form-control" name="numbers" value="{{  app('request')->input('numbers') }}">
                    <span>Введите кадастровые номера через запятую. Например "69:27:0000022:1306, 69:27:0000022:1307"</span>
                </div>
                <button class="btn btn-primary" type="submit">Получить данные</button>

            </form>

            <div class="">
                @if (\Session::has('error'))
                    <div class="alert error">
                        {!! \Session::get('error') !!}

                    </div>
                @endif
                <hr>
                @if (count($cadastrs))
                <div>Всего <b>{{ count($cadastrs) }}</b> записи</div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>CN</th>
                            <th>Адрес</th>
                            <th>Стоимость</th>
                            <th>Площадь</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cadastrs as $cadastr)
                            <tr>
                                <td>{{ $cadastr->cn }}</td>
                                <td>{{ $cadastr->address }}</td>
                                <td> @money($cadastr->cad_cost) </td>
                                <td>@area($cadastr->area_value)</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                    I don't have any records!
                @endif




            </div>
        </div>


    </body>
</html>
