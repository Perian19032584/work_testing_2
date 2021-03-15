@extends('welcome');

@section('content')
<br>
<center>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" style="width: 400px">
        Добавить
    </button>
</center>


@if ($errors->any())
    <br>
    <div class="alert alert-danger col-9" style="margin: 0 auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <br>
@endif

@if (session('success'))
    <br>
    <div class="alert alert-success col-9" style="margin: 0 auto">
        {{  session('success')  }}
    </div>
    <br>
@endif

<div class="col-9" style="margin: 0 auto">
    <table id="example" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Имя</th>
            <th>Email</th>
            <th>Сообщение</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->name }}</td>
                <td>{{ $client->email }}</td>
                <td>{{ $client->message }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Добавление записи</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src=""><span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/write_bd')}}" method="POST">

                <div class="modal-body">
                    @csrf
                    <input type="text" class="form-control" name="name" placeholder="Имя">
                    <input type="email" class="form-control mt-1" name="email" placeholder="Email">
                    <input type="text" class="form-control mt-1" name="message" placeholder="Сообщение">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                    <button type="submit" class="btn btn-primary call_form_white">Сохранить</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
