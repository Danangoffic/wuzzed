@extends('admin.template.app')
@section('content-admin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Kursus</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.kursus') }}">Kursus</a></li>
                        <li class="breadcrumb-item"><a
                                href="{{ route('admin.kursus.show', $kursus->id) }}">{{ $kursus->name }}</a></li>
                        <li class="breadcrumb-item active">Ubah</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        @include('admin.template.static-alert')
        <form action="{{ route('admin.kursus.update', $kursus->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" value="{{ $kursus->id }}">
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
                                            value="{{ $kursus->name }}">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="certificate">Sertifikat</label>
                                        <select class="form-control" id="certificate" name="certificate" required>
                                            <option value="1" @if ($kursus->certificate == 1) selected @endif>Ya
                                            </option>
                                            <option value="0" @if ($kursus->certificate == 0) selected @endif>Tidak
                                            </option>
                                        </select>
                                        @error('certificate')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="coursePoster">Poster Kursus</label>
                                        <div>
                                            <label for="coursePoster"
                                                class="btn btn-default py-0 px-2 btn-sm rounded-lg">Pilih
                                                Poster</label>
                                        </div>
                                        <input type="file" class="d-none" id="coursePoster" name="poster"
                                            onchange="previewImage('coursePoster', 'posterPreview')">
                                        @error('poster')
                                            <span class="text-xs text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="row">
                                            <div class="col-11">
                                                <span class="text-info text-sm loading-coursePoster"
                                                    style="display: none">Loading...</span>
                                                <img id="posterPreview" class="mt-2 img-thumbnail"
                                                    style="width: 450px; @if ($kursus->poster == null) display: none; @endif"
                                                    alt="Poster Preview">
                                            </div>
                                            <div class="col-1">
                                                <button type="button"
                                                    class="btn btn-danger btn-sm py-1 mt-2 coursePoster-btn"
                                                    @if ($kursus->poster == null) style="display: none" @endif
                                                    onclick="cancelFile('coursePoster', 'posterPreview')">x</button>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="courseThumbnail">Thumbnail Kursus</label>
                                        <div>
                                            <label for="courseThumbnail"
                                                class="btn btn-default py-0 px-2 btn-sm rounded-lg">Pilih
                                                Thumbnail</label>
                                        </div>
                                        <input type="file" class="d-none" id="courseThumbnail" name="thumbnail"
                                            onchange="previewImage('courseThumbnail', 'thumbnailPreview')">
                                        @error('thumbnail')
                                            <span class="text-xs text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="row">
                                            <div class="col-11">
                                                <span class="text-info text-sm loading-courseThumbnail"
                                                    style="display: none">Loading...</span>
                                                <img id="thumbnailPreview" class="mt-2 img-thumbnail"
                                                    style="width: 450px; @if ($kursus->thumbnail == null) display: none; @endif"
                                                    alt="Thumbnail Preview">
                                            </div>
                                            <div class="col-1">
                                                <button type="button"
                                                    class="btn btn-danger btn-sm py-1 mt-2 courseThumbnail-btn"
                                                    @if ($kursus->thumbnail == null) style="display: none" @endif
                                                    onclick="cancelFile('courseThumbnail', 'thumbnailPreview')">x</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="jenis">Jenis</label>
                                        <select class="custom-select" id="jenis" name="jenis" required
                                            onchange="changeJenis(this.value)">
                                            <option value="live" @if ($kursus->jenis == 'live') selected @endif>
                                                Webinar
                                            </option>
                                            {{-- <option value="online" @if (old('jenis') == 'online') selected @endif>Online Video
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
                                            {{-- <option value="free" @if ($kursus->type == 'free') selected @endif>Gratis</option> --}}
                                            <option value="premium" @if ($kursus->type == 'premium') selected @endif>
                                                Premium
                                            </option>
                                        </select>
                                        @error('type')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="description">Deskripsi</label>
                                        <textarea class="form-control" id="description" name="description" required>{{ $kursus->description }}</textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3" id="url-kursus-input">
                                        <label for="url_kursus">URL Kursus</label>
                                        <input type="url" class="form-control" id="url_kursus" name="url_kursus"
                                            value="{{ $kursus->url_kursus }}" placeholder="https://">
                                        @error('urk_kursus')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="category_id">Kategori</label>
                                        <select name="category_id" id="category_id" class="custom-select" required>
                                            <option value="" disabled>Pilih Kategori</option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}"
                                                    @if ($kursus->category_id == $item->id) selected @endif>{{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="price">Harga</label>
                                        <input type="number" class="form-control" id="price" name="price"
                                            required value="{{ $kursus->price }}">
                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="level">Tingkat</label>
                                        <select class="custom-select" id="level" name="level">
                                            <option value="all-level">Semua Level</option>
                                            {{-- <option value="beginner" @if (old('level') == 'beginner') selected @endif>
                                                Pemula</option>
                                            <option value="intermediate" @if (old('level') == 'intermediate') selected @endif>
                                                Menengah</option>
                                            <option value="advance" @if (old('level') == 'advance') selected @endif>
                                                Lanjutan</option> --}}
                                        </select>
                                        @error('level')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="duration">
                                            Durasi <small class="text-info font-weight-lighter">(Dalam Menit)</small>
                                        </label>
                                        <input type="number" class="form-control" id="duration" name="duration"
                                            required value="{{ $kursus->duration }}">
                                        @error('duration')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="{{ 'status' }}" class="form-label">{{ 'Status' }}</label>

                                        <select name="{{ 'status' }}" id="{{ 'status' }}"
                                            class="form-control" required>
                                            <option value="draft" @if ($kursus->status == 'draft') selected @endif>
                                                Draft
                                            </option>
                                            <option value="published" @if ($kursus->status == 'published') selected @endif>
                                                Published</option>
                                        </select>

                                        @error('status')
                                            <div class="invalid-feedback" role="alert">
                                                <p>{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="{{ 'mentor_id' }}">{{ 'Mentor Name' }}</label>

                                        <select name="{{ 'mentor_id' }}" id="{{ 'mentor_id' }}"
                                            class="form-control" required>
                                            <option value="" disabled selected>--Pilih Mentor--</option>
                                            @foreach ($mentors as $mentor)
                                                <option value="{{ $mentor->id }}"
                                                    @if ($mk && $mk->id == $mentor->id) selected @endif>
                                                    {{ $mentor->name }}</option>
                                            @endforeach
                                        </select>

                                        @error('mentor_id')
                                            <div class="invalid-feedback" role="alert">
                                                <p>{{ $message }}</p>
                                            </div>
                                        @enderror
                                        <div>
                                            <a class="btn btn-default btn-sm mt-2" href="{{ route('admin.mentor.add') }}"
                                                target="_blank">
                                                Tambah Mentor Baru
                                            </a>
                                            <button type="button" class="btn btn-default btn-sm mt-2"
                                                onclick="refreshMentorData()">
                                                Refresh Mentor Data
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="start_course">Jadwal Webinar</label>
                                        <div class="row">
                                            <div class="col-6">
                                                @include('components.forms.input', [
                                                    'nama' => 'start_course',
                                                    'value' => date('Y-m-d', strtotime($kursus->start_course)),
                                                    'type' => 'date',
                                                    'classInput' => 'form-control',
                                                    'placeholder' => '',
                                                ])
                                            </div>
                                            <div class="col-6">
                                                <input type="time" class="form-control" name="start_course_time"
                                                    id="start_course_time"
                                                    value="{{ date('H:i', strtotime($kursus->start_course)) }}">
                                            </div>
                                            @error('start_course')
                                                <div class="row">
                                                    <div class="col-12">
                                                        <span class="text-danger">{{ $message }}</span>
                                                    </div>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- <div class="form-group mb-3">
                                        <label for="start_course">Tanggal Mulai Kursus</label>
                                        <input type="datetime-local" class="form-control" id="start_course"
                                            name="start_course" required value="{{ old('start_course') }}">
                                    </div> --}}
                                </div>
                            </div>

                            <a href="{{ route('admin.kursus') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success float-right">Update Kursus</button>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection
@push('before-style')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/css/select2.min.css') }}">
@endpush
@push('after-style')
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/summernote/summernote.min.css') }}">
@endpush
@push('after-script')
    <script src="{{ asset('assets/admin/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/summernote/summernote.min.js') }}"></script>
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

        function previewImage(inputId,
            previewId) {
            const input = document.getElementById(inputId);
            const
                preview = document.getElementById(previewId);
            const
                btnClass = document.querySelector(`.${inputId}-btn`);
            const
                loadingInput = document.querySelector(".loading-" + inputId);
            loadingInput.style.display = "";
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                console.log({
                    file: input.files[0]
                });
                reader.readAsDataURL(input.files[0]);
                btnClass.style.display = "";
                loadingInput.style.display = "none";
            }
        }

        function cancelFile(inputId, previewId) {
            const
                input = document.getElementById(inputId);
            const
                preview = document.getElementById(previewId);
            const
                btnClass = document.querySelector(`.${inputId}-btn`);
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
