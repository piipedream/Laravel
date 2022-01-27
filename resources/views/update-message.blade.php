@extends('layouts.app')

@section('title-block')Обновление записи@endsection

@section('content')
  <h1>Обновление записи</h1>

  <form enctype="multipart/form-data" action="{{ route('contact-update-submit', $data->id) }}" method="post">
    @csrf
    @if ($data->status === "new")
    <select class="form-select" name="status">
            <option value="new">
                new
            </option>
            <option value="solved">
                solved
            </option>
            <option value="reject">
                reject
            </option>
    </select>
    @endif

    <div class="form-group mt-3 afterImage" style="display: none">
        <label for="afterImage">Image</label>
        <input type="file" class="form-control-file" id="afterImage" name="afterImage">
    </div>

    <div class="form-group mt-3 rejectReason" style="display: none">
        <label for="rejectReason">Reject Reason</label>
        <textarea type="text" name="rejectReason" placeholder="Reject Reason" id="rejectReason" class="form-control"></textarea>
    </div>

    <script>
        $(function() {
        var $select = $('.form-select'),
            $input = $('.rejectReason');
            $input2 = $('.afterImage');
        $select.on('change', function() {
        if($select.val() === 'reject') {
            $input.show();
            $input.attr("required", true);
            $input2.hide();
            $input2.attr("required", false);
        } 
        else if ($select.val() === 'solved') {
            $input2.show();
            $input2.attr("required", true);
            $input.hide();
            $input.attr("required", false);
        }
        else {
            $input.hide();
            $input.attr("required", false);
            $input2.hide();
            $input2.attr("required", false);
        }
        });
        });
    </script>

    <button type="submit" class="btn btn-success mt-3">Update</button>
</form>
@endsection
