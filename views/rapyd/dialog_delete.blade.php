@section('custom_js')

    <script>
        $(document).ready(function() {

            $('.btn[data-delete="true"]').click(function(event) {
                $('#modal-delete-button').attr('href', this.href);
                $('#modal-delete').modal('show');
                return false;
            });

        });
    </script>

@append

<div id="modal-delete" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Delete selected record</h4>
            </div>

            <div class="modal-body">
                <p>Are you sure that you want to permanently delete the selected element?</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a id="modal-delete-button" class="btn btn-danger"><i class="icon-trash"></i> Delete</a>
            </div>

        </div>
    </div>
</div>