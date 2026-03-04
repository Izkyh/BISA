<div class="card card-dark mb-4">
    <div class="card-body d-flex align-items-center">
        <i class="{{ $icon ?? 'bi bi-file-earmark-text' }}" style="font-size:2rem; margin-right:16px;"></i>
        <div>
            <h5 class="mb-1">{{ $title ?? 'Card Title' }}</h5>
            <div>{{ $slot }}</div>
        </div>
    </div>
</div>
