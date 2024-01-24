<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Form Pencarian</h5>
            </div>
            <form action="{{ route('admin.orders') }}" method="get" class="form-horizontal">
                <div class="card-body">

                    <div class="input-group row mb-3">
                        <label class="col-sm-2 col-form-label" for="group">Group:</label>
                        <div class="col-sm-10">
                            <input type="text" value="{{ $request->get('group') }}" name="group" id="group"
                                class="form-control" placeholder="Group">
                        </div>
                    </div>
                    <div class="input-group row mb-3">
                        <label class="col-sm-2 col-form-label">Key:</label>
                        <div class="col-sm-10">
                            <input type="text" name="key" class="form-control" placeholder="Key"
                                value="{{ $request->get('key') }}">
                        </div>
                    </div>
                    <div class="input-group row mb-3">
                        <label class="col-sm-2 col-form-label">Value:</label>
                        <div class="col-sm-10">
                            <input type="text" name="value" class="form-control" placeholder="Value"
                                value="{{ $request->get('value') }}">
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Cari</button>
                </div>
            </form>
        </div>
    </div>
</div>
