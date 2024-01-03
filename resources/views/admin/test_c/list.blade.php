@extends('admin.layouts.main')
@section('title', 'Content')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800 font-weight-bold">Contents</h1>

        @foreach ($datalist as $groupId => $groupedForms)
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Group ID: {{ $groupId }}</h2>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Actions
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ url('admin/test_c/edit-group/' . $groupId) }}">Edit Group</a>
           
                            <a class="dropdown-item" href="{{ url('admin/test_c/delete-group/' . $groupId) }}" onclick="return confirm('Are you sure you want to delete this group?')">Delete Group</a>

                        </div>
                    </div>
                </div>
                
                <table class="table">
                    <thead>
                        <tr>
                        <th style="width: 10%;">Title</th>
                        <th style="width: 10%;">link</th>
                        <th style="width: 10%;">Images</th>
                        <th style="width: 50%;">Description</th>
                        <th style="width: 20%;">text and links</th>
                            {{-- No need for the Action column here --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groupedForms as $formType => $forms)
                            @foreach ($forms as $form)
                                <tr>
                                <td>{{ $form->title}}</td>
                                    <td>{{ $form->link}}</td>
                                    <td>{{ $form->image}}</td>
                                    <td>{{ $form->description}}</td>
                                    
                                    <td>{{ $form->text_link  }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>
@endsection
