<form method="{{ $method ?? 'POST' }}" action="{{ $action ?? '#' }}" class="card card-dark p-4 mb-4" enctype="{{ $enctype ?? 'application/x-www-form-urlencoded' }}">
    @csrf
    {{ $slot }}
    <div class="mt-3">
        <button type="submit" class="btn btn-primary">{{ $button ?? 'Simpan' }}</button>
        <a href="{{ $back ?? url()->previous() }}" class="btn btn-secondary">Kembali</a>
    </div>
</form>
