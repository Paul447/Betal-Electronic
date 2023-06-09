@extends('admin.index')
@section('add_banner')
    
<div class="row justify-content-center" id="primarypro">
    <div class="col col-md-7 card p-0 mt-4   border border-1 shadow-sm overflow-auto boxxx">
        <div class="card-header text-center text-white text-uppercase h2">
                    {{$title}}
                </div>
                <div class="modal-body">
                    <form action="{{$url}}" method="post" class="p-4" enctype="multipart/form-data">
                        @csrf
                        @if (isset($data))
                            @method('PUT')
                        @endif
                        @if (!isset($data))
                            <div class="mb-3 justify-content-center d-flex">
                                <img src="" alt="" width="100%" 
                                    style="border:1px solid rgb(135, 135, 135); border-radius: 4px" id="imagePreview">
                            </div>

                            <div class="mb-3">
                                <label for="banner_img" class="form-label">Choose Image File</label>
                                <input type="file" class="form-control" id="banner_img" name="file"
                                    accept="image/jpg,image/png" required>
                                <p class="text-danger mt-3"><strong class="text-warning">Warning</strong> : Image size must
                                    be less the 5MB</p>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Image Alternate Text:</label>
                            <input type="text" class="form-control" name="image_alt_text"
                                value="@if (isset($data)){{ $data->image_alt_text }}@endif" required>
                        </div>

                        <div class="mb-3">
                            <label for="desc" class="col-form-label">Meta Description:</label>
                            <input type="text" class="form-control" name="meta_description" id="meta_description"
                                value="@if (isset($data)){{ $data->meta_description }}@endif">
                        </div>

                        <div class="modal-footer">
                            <a href="/admin/banner" class="btn btn-secondary float-start m-3" role="button">Cancel</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
   


    <script>
        let imageInput = document.getElementById("banner_img");
        const img = document.querySelector('#imagePreview');
        img.style.display = "none";
        imageInput.addEventListener("change", function() {
            img.style.display = "block";
            const choosedFile = this.files[0];
            if (choosedFile) {
                const reader = new FileReader(); //FileReader is a predefined function of JS
                reader.addEventListener('load', function() {
                    img.setAttribute('src', reader
                        .result); // [1] because we have 2 images with id avtar,
                });
                reader.readAsDataURL(choosedFile);
            }
        })
    </script>
@endsection
