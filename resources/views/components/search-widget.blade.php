<div class="card mb-4">
    <div class="card-header">Search</div>
    <div class="card-body">
        <form action="">
            <div class="input-group">
                <input name="search" value="{{request('search')}}" class="form-control" type="text"
                    placeholder="Enter search term..." aria-label="Enter search term..."
                    aria-describedby="button-search" />
                <button class="btn btn-primary" id="button-search" type="submit">Search</button>
            </div>
        </form>
    </div>
</div>