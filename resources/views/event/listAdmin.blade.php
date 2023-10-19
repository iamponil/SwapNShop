@extends('layouts/contentNavbarLayout')

@section('title', 'Events')

@section('content')
  <h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Events /</span> Events List
  </h4>
  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header">Events</h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Description</th>
          <th>Creator</th>
          <th>Attendees</th>
          <th>Date</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody class="table-border-bottom-0">
        @foreach($events as $event)
          <tr>
            <td><img alt="img"
                     src="https://media.istockphoto.com/id/870192016/vector/time-management-and-schedule-icon-for-upcoming-event.jpg?s=612x612&w=0&k=20&c=a2isfmvz1lDLFVwsakEZZih9lDrJJWdDBhCKp9uO-EE="
                     width="60px"></td>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$event->title}}</strong></td>
            <td>
              @if(strlen($event->description) > 30)
                {{ substr($event->description, 0, 30) }}...
              @else
                {{ $event->description }}
              @endif
            </td>

            <td>
              <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                    class="avatar avatar-xs pull-up" title="{{$event->creator->name}}">
                  <img src="{{asset('assets/img/avatars/user.jpg')}}" alt="Avatar" class="rounded-circle">
                </li>
              </ul>
            </td>
            <td>
              <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                @foreach($event->attendees as $a)
                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                      class="avatar avatar-xs pull-up" title="{{$a->name}}">
                    <img src="{{asset('assets/img/avatars/user.jpg')}}" alt="Avatar" class="rounded-circle">
                  </li>
                @endforeach
              </ul>
            </td>
            <td>{{$event->date_time->format('d M, Y')}}</td>
            <td>
              @if ($event->isUpcoming())
                <span class="badge bg-label-success me-1">Upcoming</span>
              @else
                <span class="badge bg-label-danger me-1">Passed</span>
              @endif
            </td>

            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                    class="bx bx-dots-vertical-rounded"></i></button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ route('event.edit', ['event' => $event]) }}"><i
                      class="bx bx-edit-alt me-1"></i> Edit</a>
                  <form method="POST" action="{{ route('event.destroy', ['event' => $event]) }}">
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
