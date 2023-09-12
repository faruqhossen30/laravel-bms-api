<div class="col-sm-6 col-md-4 col-lg-3 grid-margin stretch-card">
    <div class="card">
        <div class="card-body p-2 d-flex align-items-center justify-content-start bg-success">

            <div class="d-flex justify-content-start align-items-center">
                <div class="bg-white rounded-circle d-flex align-items-center justify-content-center"
                    style="width: 60px;height:60px;">
                    <i data-feather="{{ $attributes['icon'] }}" class="text-success"></i>
                </div>
                <div class="ms-2">
                    <p class="text-white fs-3">{{ $attributes['value'] }}</p>
                    <p class="text-white fs-6">{{ $attributes['label'] }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
