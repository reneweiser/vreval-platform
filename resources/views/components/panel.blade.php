<div class="row mb-5">
    <div class="col-md-12">
        <div class="card shadow">
            @include('includes.card-header', ['title'=>$title])
            {{ $slot }}
        </div>
    </div>
</div>