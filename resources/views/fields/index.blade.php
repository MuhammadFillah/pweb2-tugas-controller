<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Lapangan Olahraga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light py-5">
    <div class="container">
        <h2 class="mb-4 fw-bold">Daftar Lapangan Olahraga & Event</h2>
        
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-striped table-hover mb-0 align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="ps-3">No</th>
                            <th>Kode Lapangan</th>
                            <th>Nama Lapangan</th>
                            <th>Kategori</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($fields as $index => $field)
                            <tr>
                                <td class="ps-3">{{ $index + 1 }}</td>
                                <td><strong>{{ $field->field_code }}</strong></td>
                                <td>{{ $field->name }}</td>
                                <td>{{ $field->category->name ?? '-' }}</td>
                                <td>
                                    <span class="badge {{ $field->status == 'available' ? 'bg-success' : 'bg-warning text-dark' }}">
                                        {{ ucfirst($field->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">Belum ada data lapangan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>