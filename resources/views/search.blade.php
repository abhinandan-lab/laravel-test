@extends('layout')
@section('page_title', 'Search page')

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
                    <a class="nav-link text-dark btn btn-outline-secondary py-1 logout-btn" href="{{url('/home')}}"><i class="fas fa-list"></i> Home</a>
                  </li>

              <li class="nav-item">
                <a class="nav-link text-dark btn btn-outline-secondary py-1 logout-btn" href="{{url('/logout')}}"><i class="fas fa-power-off"></i> Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>


      <h4 class="mt-4 mb-3 text-center text-info">Search lists</h4>

      <form action="javascript:void(0);">
      <div class="container-fluid py-2  row">
        <div class="col-4 ">
            <label class="form-label text-muted">Emails</label>
          <div class="d-flex border border-1 border-secondary">
            <input id="email_input" class="form-control" type="text" placeholder="Search for emails" aria-label="Search">
          </div>

        </div>
        <div class="col-4 ">
            <label class="form-label text-muted">Phone Numbers</label>
          <div class="d-flex border border-1 border-secondary">
            <input id="phone_input" class="form-control" type="search" placeholder="Search for Phone Numbers" aria-label="Search">
          </div>
        </div>

        <div class="col-2 ">
            <label class="form-label text-muted">Gender</label>
          <div class="d-flex border border-1 border-secondary">
            <select id="gender_select" class="form-select" aria-label="Default select example">

              <option value="all">All</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
            </select>

        </div>
    </div>

    <div class="col-2 ">
        <label class="form-label"></label>
            <button id="search-btn" class="btn btn-outline-success w-100 mt-2" type="submit"> <i class="fas fa-search"></i> Search </button>

      </div>
    </form>

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
        <tbody id="search-tbody">


            {{-- @foreach ($data as $row)

            <tr>
                <th scope="row">{{$row->id}}</th>
                <td>{{$row->email}}</td>
                <td>{{$row->phone}}</td>
                <td class="text-capitalize">{{$row->gender}}</td>
              </tr>

            @endforeach --}}
        </tbody>
      </table>
      </div>

      <h5 id="abc"></h5>



    </div>

  </div>



@endsection
