<section class="container mb-4 text-center" id="subscribe">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h3 class="fw-bold text-white mb-4">Subscribe For new blogs</h3>
            <form method="POST" action="/subscribe">
                @csrf
                <div class="mb-3">
                    <input placeholder="Email Address" name="email" type="email" class="form-control"
                        autocomplete="false" />
                </div>
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <button type="submit" class="btn btn-primary">Subscribe Now</button>
            </form>
        </div>
    </div>
</section>