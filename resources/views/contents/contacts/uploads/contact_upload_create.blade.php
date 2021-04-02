@extends('contents.layouts.card',['BreadcrumpTitle'=>'Contacts'])

@section('card-header')
 <p class="card-header-title has-text-info-light  is-size-4"> Add Contacts</p>
@stop

@section('card-content')

    <!-- Flash message  -->
    @include('notifications.flash_message')
    <!-- ./ Flash message -->

<div class="box  has-background-warning-light">
  <span class="icon has-text-warning-dark">
    <span class="icon"><i class="mdi mdi-information"></i></span></i>
  </span>
  <span class="has-text-warning-dark">
    Ensure you that your loaded file is CSV format. Download this
    <a href="#" class="has-text-warning-dark has-text-weight-bold"> CSV template </a>
    and built your own csv file based on it.
  </span>

</div>

  <form class="box" action="{{ route('upload.post') }}" method="POST" enctype="multipart/form-data" >
      @csrf

        <div class="columns is-centered has-background-link-light">
            <div class="field is-horizontal has-background-dark-light">
              <div class="file has-name is-boxed">
                <label class="file-label">
                    <input class="file-input @error('upload-file') is-danger @enderror" type="file" name="upload-file" id="upload-file">
                    @error('upload-file')
                         <p class="help is-danger has-text-centered">{{ $message }}</p>
                    @enderror
                    <span class="file-cta">
                        <span class="file-icon">
                          <i class="mdi mdi-file-upload"></i>
                        </span>
                        <span class="file-label">
                          Choose a file…
                        </span>
                    </span>
                    <span class="file-name has-text-centered @error('upload-file') has-background-danger-light has-text-danger @enderror">
                      No Selected file
                    </span>
                </label>
              </div>
            </div>
        </div>
        <hr/>
          <div class="columns is-centered">
            <div class="field is-grouped">
              <p class="control">
                <button type="submit" class="button is-link">
                  <span class="icon"><i class="mdi mdi-upload"></i></span>
                  <span>Upload</span>
                </button>
              </p>
              <p class="control">
                <button type="reset" class="button is-danger">
                  <span class="icon"><i class="mdi mdi-rotate-3d-variant"></i></span>
                  <span>Reset</span>
                </button>
              </p>
            </div>
         </div>
  </form>

@endsection

@section('card-footer')

  <a class="button is-primary" href="{{ route('contact.index') }}">
    <span class="icon"><i class="mdi mdi-cryengine"></i></span>
    <span>See All Contact</span>
  </a>
@endsection


@section('scripts')
<script type="text/javascript">
// 1. Display filename when select file
// 2. Clear filename when form reset

document.addEventListener('DOMContentLoaded', () => {
  // 1. Display file name when select file
  let fileInputs = document.querySelectorAll('.file.has-name')
  for (let fileInput of fileInputs) {
    let input = fileInput.querySelector('.file-input')
    let name = fileInput.querySelector('.file-name')
    input.addEventListener('change', () => {
      let files = input.files
      if (files.length === 0) {
        name.innerText = 'No file selected'
      } else {
        name.innerText = files[0].name
      }
    })
  }

  // 2. Remove file name when form reset
  let forms = document.getElementsByTagName('form')
  for (let form of forms) {
    form.addEventListener('reset', () => {
      console.log('a')
      let names = form.querySelectorAll('.file-name')
      for (let name of names) {
        name.innerText = 'No file selected'
      }
    })
  }
})
</script>
@endsection
