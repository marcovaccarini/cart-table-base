<script type="text/javascript">jQuery(document).ready(function () {
        $("#input-ke-1").fileinput({
            theme: "explorer",
            uploadUrl: "/file-upload-batch/2",
            allowedFileExtensions: ['jpg', 'png', 'gif'],
            overwriteInitial: false,
            initialPreviewAsData: true,
            initialPreview: [
                @if(count($product->images))
                    @foreach($product->images as $image)
                        "/img/small/{{ $image->filename }}",
                    @endforeach
                @endif
            ],
            initialPreviewConfig: [
                @if( count($product->images))
                    @foreach($product->images as $image)
                        {caption: "{{ $image->filename }}", url: "/admin/product/image/delete/{{ $image->id }}", key: {{ $loop->iteration }} },
                    @endforeach
                @endif
            ]
        });
    });</script>
<script src="/AdminLTE/dist/js/purify.min.js"></script>
<script src="/AdminLTE/dist/js/all-krajee.js"></script>
<script src="/AdminLTE/dist/js/sortable.min.js"></script>
<script src="/AdminLTE/dist/js/fileinput.min.js"></script>
<script src="/AdminLTE/dist/js/theme.js"></script>