<div class="row">
    <div class="col-md-9 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <span> <i data-feather="gift" class="me-2 "></i>
                   CLub Commission
                </span>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.setting.clubcommission') }}" method="post">
                    @csrf
                    <div class="input-group date  mb-2">
                        <span class="input-group-text">৳</i></span>
                        <input type="number" name="club_commission" value="{{ option('club_commission') }}" class="form-control " />
                    </div>
                    <button type="submit" class="btn btn-primary btn-icon-text">
                        <i class="btn-icon-prepend" data-feather="save"></i>
                        Save
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
