@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Bookmarks 
                    <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">
                      Add Bookmark
                    </button></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            <ul class="m-0">
                                <li>{{ session('status') }}</li>
                            </ul>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="m-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- Button trigger modal -->
                    <ul class="list-group">
                        @foreach($bookmarks as $bookmark)
                            <li class="list-group-item"><a href="{{ $bookmark->url }}" target="_blank"><strong>{{ $bookmark->name }}</strong> <span class="badge badge-secondary">{{ $bookmark->description }}</span></a>
                                <button class="btn btn-sm btn-danger float-right delete-bookmark" data-id="{{ $bookmark->id }}">&#10006;</button>
                            </li>
                        @endforeach
                    </ul>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Bookmark</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form action="{{ route('bookmarks.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Bookmark Name</label>
                                    <input name="name" type="text" class="form-control" id="name">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlInput1">Bookmark URL</label>
                                    <input name="url" type="url" class="form-control" id="url">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlInput1">Bookmark Description</label>
                                    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                  </div>
                                  <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
