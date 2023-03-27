<div class="row">
    <div class="col grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <span> <i data-feather="gift" class="me-2 "></i>
                    Daimond Commission
                </span>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.setting.footernotice') }}" method="post">
                    @csrf
                    <div class="input-group date  mb-2">
                        {{-- <input type="number" step="0.01" name="daimond_commission" value="{{ option('daimond_commission') }}" class="form-control " /> --}}
                        <textarea name="footer_notice" id="" cols="30" rows="10" class="form-control "> {{ option('footer_notice') }}</textarea>
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
