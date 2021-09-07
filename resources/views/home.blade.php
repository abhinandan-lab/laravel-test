@extends('layout')
@section('page_title', 'Home')

@section('container')


<div class="bg-grad d-flex justify-content-center align-items-center">
    <div class="container bg-white rounded-3" style="height: 95vh;">



      <nav class=" navbar navbar-expand-lg navbar-light bg-light  border-2 border-secondary" >
        <div class="container-fluid">
          <a class="navbar-brand text-indigo" href="#">airindustry</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item me-2">
                    <a class="nav-link text-dark btn btn-outline-secondary py-1 logout-btn" href="{{url('/search')}}"><i class="fas fa-search"></i> Search</a>
                  </li>

              <li class="nav-item">
                <a class="nav-link text-dark btn btn-outline-secondary py-1 logout-btn" href="{{url('/logout')}}"><i class="fas fa-power-off"></i> Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>


      <h4 class="text-center text-info mt-4">List of users</h4>

      <div class="container mt-5">

        {{-- @php
            print_r($data);
        @endphp --}}


      <table class="table border border-2  table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Emails</th>
            <th scope="col">Phone Numbers</th>
            <th scope="col">Gender</th>
          </tr>
        </thead>
        <tbody>

            @foreach ($data as $row)

            <tr>
                <th scope="row">{{$row->id}}</th>
                <td>{{$row->email}}</td>
                <td>{{$row->phone}}</td>
                <td class="text-capitalize">{{$row->gender}}</td>
              </tr>

            @endforeach
        </tbody>
      </table>
      </div>




    </div>

  </div>



@endsection
