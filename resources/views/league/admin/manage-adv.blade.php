@extends('layouts.main-layout')

@section('content')
    
    

    <!-- Hero -->
    <section class="dark-mode hero bg-size-cover bg-repeat-0 bg-position-center position-relative overflow-hidden py-5 " style="min-height: 100vh">

        <div class="mt-4 mb-lg-2 mb-2 pt-3">
            <h1 class="display-1 text-center mb-0 text-warning header-parallax hero-title">All Advertisements</h1>
        </div>

        <div class="container position-relative zindex-2 pb-md-2 pb-lg-4  hero-container ">

            <!-- Dark bordered table -->
            <div class="table-responsive">
                
                <form action="{{ route('adv.update', ['adv' => 1]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <table class="table table-dark table-bordered">
                        <thead>
                            <tr>
                            <th scope="col" width="5%">#No</th>
                            <th scope="col" width="20%">Advertisement Name</th>
                            <th scope="col"  width="40%">Poster</th>
                            <th scope="col" >Hyperlink</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($advs as $index => $adv)
                                <tr>
                                    <td class="text-center">
                                        {{ $index + 1}}
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="advs[{{ $index }}][adv_name]" value="{{ $adv->adv_name }}">
                                        <input type="hidden" name="advs[{{ $index }}][id]" value="{{ $adv->id }}">
                                    </td>
                                    <td>
                                        <input type="file" class="form-control" name="advs[{{ $index }}][poster]" value="{{ $adv->poster }}" onchange="previewImage(event, '{{ $adv->id }}')">
                                        <img id="image-{{ $adv->id }}" src="{{ asset('public/assets/img/home/advertisement/'.$adv->poster) }}" style="height: 100%" class="card-img-top mb-3" alt="Advertisement-{{$adv->adv_name}}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="advs[{{ $index }}][hyperlink]" value="{{ $adv->hyperlink }}">
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-grid justify-content-end fixed-bottom fixed-right mb-4 me-5 pe-5">
                        <button class="btn btn-warning btn-lg " type="button" data-bs-toggle="offcanvas" data-bs-target="#AddNewadv" aria-controls="AddNewadv"><i class='bx bx-plus-circle me-1'></i> New adv</button>
                        <button type="submit" class="btn btn-success btn-lg px-5 mt-1">Update Record</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="AddNewadv" aria-labelledby="AddNewadvLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="AddNewadvLabel">Add New adv</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <form  method="POST" action="{{ route('adv.store') }}" enctype="multipart/form-data">
                @csrf
                    <div class="mb-3">
                        <label for="adv_name" class="form-label">Advertisement Name</label>
                        <input type="text" class="form-control" id="adv_name" name="adv_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="hyperlink" class="form-label">Hyperlink</label>
                        <input type="url" class="form-control" id="hyperlink" name="hyperlink" required>
                    </div>
                    <div class="mb-3">
                        <label for="logo" class="form-label">Poster</label>
                        <input type="file" class="form-control" id="poster" name="poster" required>
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
        
    </section>
    <script>
        function previewImage(event, advId) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function () {
                var imgElement = document.getElementById('image-' + advId);
                imgElement.src = reader.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    </script>
@endsection
