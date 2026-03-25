<form method="POST" action="{{ route('special_request') }}" >
@csrf
    <div class="row">
        <div class="form-group">
            <label class="form-label" for="name">Type Special Request</label>
            <div class="form-control-wrap">
                <textarea name="special_request" id="" cols="30" rows="10" required></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
    </div>
</form>