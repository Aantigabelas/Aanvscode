<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                    <h1 class="text-center">EDIT DATA</h1>
                        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            

                            <div class="form-group">
                                <label class="font-weight-bold">FOTO</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NAMA</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $post->nama) }}" placeholder="Masukkan Nama">
                            
                                <!-- error message untuk title -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">NIM</label>
                                <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim', $post->nim) }}" placeholder="Nomor Induk Mahasiswa">
                            
                                <!-- error message untuk title -->
                                @error('nim')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">JURUSAN</label>
                                <input type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" value="{{ old('jurusan', $post->jurusan) }}" placeholder="Prodi Jurusan">
                            
                                <!-- error message untuk title -->
                                @error('jurusan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                        <label class="font-weight-bold">SEMESTER</label><br>  
                        <select class="form-select" name="semester" aria-label="Default select example">
                            <!--ption selected>Pilih Semester</option-->
                            <option value="1" @if($post->semester == "1") selected @endif>1</option>
                            <option value="2" @if($post->semester == "2")selected @endif>2</option>
                            <option value="3" @if($post->semester == "3") selected @endif>3</option>
                            <option value="4" @if($post->semester == "4") selected @endif>4</option>
                            <option value="5" @if($post->semester == "5") selected @endif>5</option>
                            <option value="6" @if($post->semester == "6") selected @endif>6</option>
                            <option value="7" @if($post->semester == "7") selected @endif>7</option>
                            <option value="8" @if($post->semester == "8") selected @endif>8</option>
                            <option value="9" @if($post->semester == "9") selected @endif>9</option>
                            <option value="10" @if($post->semester == "10") selected @endif>10</option>
                            <option value="11" @if($post->semester == "11") selected @endif>11</option>
                            <option value="12" @if($post->semester == "12") selected @endif>12</option>
                        </select>
                            
                                <!-- error message untuk content -->
                                @error('semester')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                            </div>

                            <div class="form-group">
                            <label class="font-weight-bold">JENIS KELAMIN</label><br>  
                            <select class="form-select" name="jenis_kelamin" aria-label="Default select example">
                            <!--option selected>Pilih Jenis Kelamin</option-->
                            <option value="L" @if($post->jenis_kelamin == "L") selected @endif>Laki-laki</option>
                            <option value="P" @if($post->jenis_kelamin == "P") selected @endif>Perempuan</option>
                            </select>
                            
                                <!-- error message untuk content -->
                                @error('jenis_kelamin')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    </div>
                                    
                            <div class="form-group">
                                <label class="font-weight-bold">ALAMAT</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Masukkan Alamat">{{ old('alamat', $post->alamat) }}</textarea>
                            
                                <!-- error message untuk content -->
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    </div>

                            <button type="submit" class="btn btn-md btn-success">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-danger">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>