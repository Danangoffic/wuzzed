@extends('admin.template.app')
@section('content-admin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Kursus</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Kursus</a></li>
                        <li class="breadcrumb-item active">Tambah Kursus</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row mb-3">
            <div class="col-md-12">
                @if (Session::has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
        {{-- form upload file --}}
        <form action="{{ route('admin.kursus.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah Kursus</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Title -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="name">Nama Kursus</label>
                                        <input type="text" class="form-control" id="name" name="name" required
                                            placeholder="Input Nama Kursus" value="{{ old('name') }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="certificate">Sertifikat</label>
                                        <select class="form-control" id="certificate" name="certificate" required>
                                            <option value="1">Ya</option>
                                            <option value="0">Tidak</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="coursePoster">Poster Kursus</label>
                                        <input type="file" class="form-control-file" id="coursePoster" name="poster"
                                            onchange="previewImage('coursePoster', 'posterPreview')">
                                        @error('poster')
                                            <span class="text-xs text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="row">
                                            <div class="col-11">
                                                <img id="posterPreview" class="mt-2 img-thumbnail"
                                                    style="width: 450px; display: none;" alt="Poster Preview">
                                            </div>
                                            <div class="col-1">
                                                <button type="button" class="btn btn-danger btn-sm mt-2 coursePoster-btn"
                                                    style="display: none"
                                                    onclick="cancelFile('coursePoster', 'posterPreview')">x</button>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="courseThumbnail">Thumbnail Kursus</label>
                                        <input type="file" class="form-control-file" id="courseThumbnail"
                                            name="thumbnail" onchange="previewImage('courseThumbnail', 'thumbnailPreview')">
                                        @error('thumbnail')
                                            <span class="text-xs text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="row">
                                            <div class="col-11">
                                                <img id="thumbnailPreview" class="mt-2 img-thumbnail"
                                                    style="width: 450px; display: none;" alt="Thumbnail Preview">
                                            </div>
                                            <div class="col-1">
                                                <button type="button"
                                                    class="btn btn-danger btn-sm mt-2 courseThumbnail-btn"
                                                    style="display: none"
                                                    onclick="cancelFile('courseThumbnail', 'thumbnailPreview')">x</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="jenis">Jenis</label>
                                        <select class="form-control" id="jenis" name="jenis" required
                                            onchange="changeJenis(this.value)">
                                            <option value="live" @if (old('jenis') == 'live') selected @endif>
                                                Webinar
                                            </option>
                                            {{-- <option value="online" @if (old('jenis') == 'online') selected @endif>Online
                                            </option>
                                            <option value="bootcamp" @if (old('jenis') == 'bootcamp') selected @endif>
                                                Bootcamp</option>
                                            <option value="e-book" @if (old('jenis') == 'e-book') selected @endif>E-Book
                                            </option> --}}
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="type">Tipe</label>
                                        <select class="form-control" id="type" name="type" required>
                                            {{-- <option value="free" @if (old('type') == 'free') selected @endif>Gratis
                                            </option> --}}
                                            <option value="premium" @if (old('type') == 'free') selected @endif>
                                                Premium</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="description">Deskripsi</label>
                                        <textarea class="form-control" id="description" name="description" required>{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3" id="url-kursus-input">
                                        <label for="url_kursus">URL Kursus</label>
                                        <input type="url" class="form-control" id="url_kursus" name="url_kursus"
                                            value="{{ old('url_kursus') }}" placeholder="https://">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="category_id">Kategori</label>
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="" disabled>Pilih Kategori</option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}"
                                                    @if (old('category_id') == $item->id) selected @endif>{{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="price">Harga</label>
                                        <input type="number" class="form-control" id="price" name="price"
                                            required value="{{ old('price') }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="level">Tingkat</label>
                                        <select class="form-control" id="level" name="level">
                                            <option value="all-level" @if (old('level') == 'all-level') selected @endif>
                                                Semua Level</option>
                                            <option value="beginner" @if (old('level') == 'beginner') selected @endif>
                                                Pemula</option>
                                            <option value="intermediate" @if (old('level') == 'intermediate') selected @endif>
                                                Menengah</option>
                                            <option value="advance" @if (old('level') == 'advance') selected @endif>
                                                Lanjutan</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="duration">Durasi</label>
                                        <input type="number" class="form-control" id="duration" name="duration"
                                            required value="{{ old('duration') }}">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="status">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="draft">Draft</option>
                                            <option value="published">Published</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="mentor_id">Nama Mentor</label>
                                        <select class="form-control" id="mentor_id" name="mentor_id">
                                            @foreach ($mentors as $mentor)
                                                <option value="{{ $mentor->id }}">{{ $mentor->name }}</option>
                                            @endforeach
                                        </select>
                                        <a class="btn btn-default btn-sm mt-2" href="{{ route('admin.mentor.add') }}"
                                            target="_blank">
                                            Tambah Mentor Baru
                                        </a>
                                        <button type="button" class="btn btn-default btn-sm mt-2"
                                            onclick="refreshMentorData()">
                                            Refresh Mentor Data
                                        </button>
                                    </div>

                                    {{-- <div class="form-group mb-3">
                                        <label for="start_course">Tanggal Mulai Kursus</label>
                                        <input type="datetime-local" class="form-control" id="start_course"
                                            name="start_course" required value="{{ old('start_course') }}">
                                    </div> --}}
                                </div>
                            </div>

                            <a href="{{ route('admin.kursus') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success float-right">Simpan Kursus</button>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </form>
    </section>
    <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('admin.mentor.store_in_course') }}" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Mentor Baru</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <div class="form-group mb-3" id="add-new-mentor-name">
                            <label for="name">Nama Mentor</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <!-- /.content -->
@endsection
@push('before-style')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
@endpush
@push('after-style')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/summernote/summernote.min.css') }}">
    @if (Session::has('success'))
        <link rel="stylesheet" href="{{ asset('assets/admin/plugins/toastr/toastr.min.css') }}">
    @endif
@endpush
@push('after-script')
    <script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/summernote/summernote.min.js') }}"></script>
    @if (Session::has('success'))
        <script src="{{ asset('assets/admin/plugins/toastr/toastr.min.js') }}"></script>
    @endif
    <script>
        $(document).ready(function() {
            $('#description').summernote({
                placeholder: 'Tambahkan deskripsi kursus',
                tabsize: 2,
                height: 300,
                minHeight: null,
                maxHeight: null
            });
            $('#category_id').select2();
        });
        @if (Session::has('success'))
            toastr.success('Have fun storming the castle!', {{ session('success') }})
        @endif

        function changeJenis(val) {
            if (val == 'live') {
                $("#url-kursus-input").fadeIn();
            } else {
                $("#url-kursus-input").fadeOut();
            }
        }

        function previewImage(inputId, previewId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            const btnClass = document.querySelector(`.${inputId}-btn`);

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(input.files[0]);
                btnClass.style.display = "";
            }
        }

        function cancelFile(inputId, previewId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            const btnClass = document.querySelector(`.${inputId}-btn`);

            input.value = ''; // Clear input value
            preview.style.display = 'none'; // Hide preview
            btnClass.style.display = "none";

        }

        function refreshMentorData() {
            $.ajax({
                url: "{{ route('api.mentors') }}",
                success: (res) => {
                    if (res.success) {
                        const mentor = document.querySelector("#mentor_id");
                        mentor.innerHTML = res.data;
                    }
                }
            });
        }
    </script>
@endpush
