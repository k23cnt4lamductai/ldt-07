<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ldt - Danh sach khoa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>
<body>
    <section class="container border my-3">
        <h1>Danh sach khoa</h1>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Ma khoa</th>
                        <th>Ten khoa</th>
                        <th>Chuc nang</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $stt=0;
                    @endphp
                    @foreach ($ldtKhoa as $items)
                    <tr>
                        <td>{{$stt}}</td>
                        <td>{{$items->ldtmakh}}</td>
                        <td>{{$items->ldttenkh}}</td>
                        <td>
                            <a href="/khoa/detail/{{$items->ldtmakh}}" class="btn btn-success">
                                Chi tiet
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="/khoa/edit/{{$items->ldtmakh}}" class="btn btn-primary">
                                Sua
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="/khoa/delete/{{$items->ldtmakh}}" class="btn btn-danger">
                                Delete</a>
                            <a href="/khoa/delete/{{$items->ldtmakh}}" class="btn btn-danger"
                                onclick="return confirm('Ban co chac chan xoa khoa nay ko?')"
                                >
                                <i class="fa-solid fa-trash"></i></i>
                            </a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="/khoa/insert" class="btn btn-primary">Them moi</a>
    </section>
</body>
</html>