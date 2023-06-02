<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Редактирование пользователя</title>

    <x-admin-css-code></x-admin-css-code>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <x-admin-nav></x-admin-nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <x-admin-aside></x-admin-aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование пользователя</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('admin.users.index')}}">Пользователи</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <h6></h6>
                    <div class="col-12">
                        <form action="{{route('admin.users.update', $user->id)}}" method="post" class="w-25">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <input type="text"
                                       value="{{$user->username}}"
                                       class="form-control @error('username') border border-danger @enderror"
                                       name="username" placeholder="Имя пользователя"
                                >
                                @error('username')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email"
                                       value="{{$user->email}}"
                                       class="form-control @error('email') border border-danger @enderror"
                                       name="email" placeholder="Почта"
                                >
                                @error('email')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="number"
                                       value="{{$user->count_attractions}}"
                                       class="form-control @error('count_attractions') border border-danger @enderror"
                                       name="count_attractions" placeholder="Количество достопримичательностей"
                                >
                                @error('count_attractions')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="number"
                                       value="{{$user->scores}}"
                                       class="form-control @error('scores') border border-danger @enderror"
                                       name="scores" placeholder="Количество баллов"
                                >
                                @error('scores')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <input type="submit" class="btn btn-primary" value="Изменить">
                        </form>
                    </div>

                    <!-- ./col -->
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <x-admin-footer></x-admin-footer>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<x-admin-js-code></x-admin-js-code>
</body>
</html>
