<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Редактирование достопримечательности</title>

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
                        <h1 class="m-0">Редактирование достопримечательности</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Главная</a></li>
                            <li class="breadcrumb-item active">
                                <a href="{{route('admin.attractions.index')}}">Достопримечательности</a>
                            </li>
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
                    <div class="col-12 mb-3">
                        <form action="{{route('admin.attractions.update', $attraction->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25">
                                <input type="text"
                                       value="{{$attraction->name}}"
                                       class="form-control @error('name') border border-danger @enderror"
                                       name="name" placeholder="Название достопримечательности"
                                >
                                @error('name')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group w-25">
                                <input type="text"
                                       value="{{$attraction->address}}"
                                       class="form-control @error('address') border border-danger @enderror"
                                       name="address" placeholder="Адрес"
                                >
                                @error('address')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group w-25  @error('main_image') border border-danger @enderror">
                                <label>Изменить главное изображение</label>
                                <div class="w-50 mb-3">
                                    <img src="{{asset('storage/' . $attraction->main_image)}}"
                                         alt="image"
                                         style="height: 180px; border-radius: 25px;"
                                    >
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="main_image">
                                        <label class="custom-file-label">Выберите изображение</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузка</span>
                                    </div>
                                </div>
                            </div>
                            @error('main_image')
                            <p class="text-danger">{{$message}}</p>
                            @enderror

                            <div class="form-group w-25">
                                <input type="number"
                                       value="{{$attraction->lat}}"
                                       class="form-control @error('lat') border border-danger @enderror"
                                       name="lat" placeholder="Широта"
                                >
                                @error('lat')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group w-25">
                                <input type="number"
                                       value="{{$attraction->long}}"
                                       class="form-control @error('long') border border-danger @enderror"
                                       name="long" placeholder="Долгота"
                                >
                                @error('long')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group w-25">
                                <input type="number"
                                       value="{{$attraction->score}}"
                                       class="form-control @error('score') border border-danger @enderror"
                                       name="score" placeholder="Баллы"
                                >
                                @error('score')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group @error('content') border border-danger @enderror">
                                <label for="summernote_content">Основной контент</label>
                                <textarea id="summernote_content" name="content">
                                    {{$attraction->content}}
                                </textarea>
                            </div>
                            @error('content')
                            <p class="text-danger">{{$message}}</p>
                            @enderror

                            <input type="submit" class="btn btn-primary" value="Обновить">
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
