    {{-- Javascript --}}
    <script src="{{ asset('backend/libraries/popper/popper.min.js') }}"></script>
    <script src="{{ asset('backend/libraries/bootstrap-5/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/styles/js/main.js') }}"></script>
    <script src="{{ asset('backend/libraries/ckeditor/ckeditor.js') }}"></script>

    {{-- CK-Editor Script --}}
    <script>
        CKEDITOR.replace('description');
    </script>
    
    <script>
        CKEDITOR.replace('vision');
    </script>
    
    <script>
        CKEDITOR.replace('mission');
    </script>