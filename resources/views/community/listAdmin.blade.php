@extends('layouts/contentNavbarLayout')

@section('title', 'Communities')

@section('content')
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Communities /</span> Communities List
  </h4>
  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header">Communities</h5>
    <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Description</th>
          <th>Creator</th>
          <th>Created At</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody class="table-border-bottom-0">
        @foreach($communities as $community)
          <tr>
            <td><img alt="img" src="https://www.yacht-transporte.com/assets/images/e/team-35ed14a1.svg" width="100px" height="65px"></td>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$community->name}}</strong></td>
            <td>
              @if(strlen($community->description) > 30)
                {{ substr($community->description, 0, 30) }}...
              @else
                {{ $community->description }}
              @endif
            </td>

            <td>
              <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                    class="avatar avatar-xs pull-up" title="{{$community->creator->name}}">
                  <img src="{{asset('assets/img/avatars/user.jpg')}}" alt="Avatar" class="rounded-circle">
                  {{$community->creator->name}}
                </li>
              </ul>
            </td>
            <td>{{$community->created_at->format('d M, Y')}}</td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                    class="bx bx-dots-vertical-rounded"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('community.edit', ['community' => $community]) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    <form  method="POST" action="{{ route('community.destroy', ['community' => $community]) }}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="dropdown-item">
                        <i class="bx bx-trash me-1"></i> Delete
                      </button>
                    </form>
                </div>
              </div>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->

@endsection
