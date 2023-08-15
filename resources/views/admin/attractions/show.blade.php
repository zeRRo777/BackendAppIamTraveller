<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Достопримечательность</title>

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
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="mr-2">{{$attraction->name}}</h1>
                        <a href="{{route('admin.attractions.edit', $attraction->id)}}"
                           class="text-success">
                            <i class="fas fa-sharp fa-solid fa-pen"></i>
                        </a>
                        <form action="{{route('admin.attractions.destroy', $attraction->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="border-0 bg-transparent">
                                <i class="fas fa-trash text-danger" role="button"></i>
                            </button>
                        </form>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.attractions.index')}}">Достопримечательности</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.cities.show', $attraction->city->id)}}">{{$attraction->city->name}}</a>
                            </li>
                            <li class="breadcrumb-item active">{{$attraction->name}}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <h4>Информация о достопримечательности</h4>
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>{{$attraction->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Название достопримечательности</td>
                                        <td>{{$attraction->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Город</td>
                                        <td>{{$attraction->city->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Страна</td>
                                        <td>{{$attraction->city->country}}</td>
                                    </tr>
                                    <tr>
                                        <td>Широта</td>
                                        <td>{{$attraction->lat}}</td>
                                    </tr>
                                    <tr>
                                        <td>Долгота</td>
                                        <td>{{$attraction->long}}</td>
                                    </tr>
                                    <tr>
                                        <td>Адрес</td>
                                        <td>{{$attraction->address}}</td>
                                    </tr>
                                    <tr>
                                        <td>Баллы</td>
                                        <td>{{$attraction->score}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-4">
                        <h4>Основной контент</h4>
                    </div>
                    <div class="col-12 text-justify">
                        <p>{!! $attraction->content !!}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <h4 class="">Главное изображение</h4>
                        <div class="mb-5">
                            <img src="{{asset('storage/' . $attraction->main_image)}}"
                                 alt="image"
                                 style="width: 500px;border-radius: 25px;"
                            >
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2 mb-3">
                        <a href="{{route('admin.attractions.addImage', $attraction->id)}}"
                           class="btn btn-block btn-primary d-flex align-items-center justify-content-center"
                        >
                            Добавить изображение к достопримечательности
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <h4>Изображения достопримечательности</h4>
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Изображение</th>
                                            <th colspan="1" class="text-center">Удалить</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($attraction->images as $image)
                                            <tr>
                                                <td class="col-6">
                                                    <img src="{{asset('storage/' . $image->image)}}"
                                                         alt="image"
                                                         style="width: 100%;border-radius: 25px;"
                                                    >
                                                </td>
                                                <td class="col-3 align-middle text-center">
                                                    <form action="{{route('admin.attractions.destroyImage', $image)}}"
                                                          method="post"
                                                    >
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-block btn-danger w-50 mx-auto">
                                                            Удалить
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
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
