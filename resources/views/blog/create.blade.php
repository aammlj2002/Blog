<x-layout>
    <div class="row">
        <div class="col-6">
            <h3>Create Blog</h3>
            <form class="mb-4">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Into</label>
                    <textarea type="text" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Body</label>
                    <textarea type="text" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-select">
                        <option>Disabled select</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
            </form>
        </div>
    </div>
</x-layout>