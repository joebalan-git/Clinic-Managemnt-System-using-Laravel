@extends('backend.lay')
@section('title', 'Record Management')
  
<link rel="stylesheet" href={{ url('css/product/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}>

<link rel="stylesheet" href={{ url('css/product/assets/css/style.css') }}>

@section('content')

<div class="container" >
    <div class="row">
        <legend>Prescription</legend>
        
            @if (session('info'))
              <div class="alert alert-success">
                 {{ session('info') }}
              </div>
            @endif
          
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Doctor_id</th>
                <th scope="col">Patient_id</th>
                <th scope="col">Prescription</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody>
                         @if (count($prescriptions)>0)
                         @foreach ($prescriptions as $prescription)
                             
                                       
                                 
              <tr class="table-active">
              <td>{{$prescription->id}}</td>
              <td>{{$prescription->doctor_id}}</td>
              <td>{{$prescription->patient_id}}</td>
              <td>{{$prescription->description}}</td>
                <td>
                  <a href='{{ url("/read_prescription/{$prescription->id}")}}' class="label label-primary"> Read </a>|
                  <a href='{{ url("/update_prescription/{$prescription->id}") }}' class="label label-success"> Update </a>|
                  <a href='{{ url("/delete_prescription/{$prescription->id}") }}' class="label label-danger"> Delete </a>
                </td>
              </tr>
              @endforeach
                             
              @endif  
                    
            </tbody>
          </table> 
    </div>
</div>

<a href="{{ url('/create_prescription') }}" class="btn btn-primary">Create</a>


@endsection