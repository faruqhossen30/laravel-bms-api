<button type="button" data-bs-toggle="modal" data-bs-target="#optionOptionModal{{ $option->id }}"
    class="btn btn-success btn-xs">
    {{ $option->bet_rate }}
</button>

<div class="modal fade" id="optionOptionModal{{ $option->id }}" tabindex="-1"
    aria-labelledby="optionOptionModal{{ $option->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('questionoption.update', $option->id)}}" method="POST" class="modal-content">
            @csrf

            <div class="modal-header">
                <h5 class="modal-title" id="optionOptionModal{{ $option->id }}Label">option Option
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div>
                        <label for="" class="form-label">Option Name</label>
                        <input type="text" class="form-control" value="{{ $option->title }}" disabled>
                    </div>
                    <div>
                        <label for="" class="form-label">Rate</label>
                        <input type="number" name="bet_rate" class="form-control" value="{{ $option->bet_rate }}" step="0.01">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
