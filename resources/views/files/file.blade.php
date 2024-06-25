<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Management </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h4 class="text-center my-4">My File</h4>
                </div>
                <div class="card rounded">
                    <div class="card-body">
                        <a href="{{ route('room') }}" class="btn btn-md btn-primary mb-3">Back</a>
                        <a href="{{ url('files/create') }}" class="btn btn-md btn-primary mb-3 float-end">Upload File</a>
                       
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nama File</th>
                                    <th scope="col" style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @forelse ($files as $file)
                                    <tr>
                                        <td>{{ $file->original_name }}</td>
                                        <td class="text-center">
                                        <a href="{{ route('files.download', $file) }}" class="btn btn-sm btn-primary">Download</a>
                                        <a href="{{ route('files.edit',['file'=> $file->id])}}" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="{{ route('files.delete',['file'=> $file->id])}}" class="btn btn-sm btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="text-muted text-center">Data file belum tersedia</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $files->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>