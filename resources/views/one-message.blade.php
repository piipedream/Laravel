@extends('layouts.app')

@section('title-block'){{$data->subject}}@endsection

@section('content')
  <h1>{{$data->subject}}</h1>
    <div class="alert alert-info">
      <p>{{$data->message}}</p>
      <p>Status: {{ $data->status }}</p>
      <p>Category: {{ $data->category }}</p>
      <p>{{$data->email}} - {{$data->name}}</p>
      <p><small>{{$data->created_at}}</small></p>

      @if ( $data->before_img != null )
        <h3>Image before:</h3>
        <img src="{{asset("storage/image/$data->before_img")}}" alt="">
      @endif

      @if ( $data->after_img != null )
          <h3>Image after:</h3>
          <img src="{{asset("storage/image/$data->after_img")}}" alt="">
      @endif

      @can('admin')
        <a href="{{route('contact-update', $data->id)}}"><button class="btn mt-3 btn-primary">Редактировать</button></a>
      @endcan
      <a href="{{route('contact-delete', $data->id)}}"><button class="btn mt-3 btn-danger show_confirm">Удалить</button></a>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
    
        $('.show_confirm').click(function(event) {
              var form =  $(this).closest("form");
              var name = $(this).data("name");
              event.preventDefault();
              swal({
                  title: `Are you sure you want to delete this record?`,
                  text: "If you delete this, it will be gone forever.",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  form.submit();
                }
              });
          });
      
    </script>

@endsection
