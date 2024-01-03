@extends('admin.layouts.main')
@section('title', 'Add Menu')
@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800 w-600">Add Menu</h1>
    <div class="d-sm-flex align-items-center justify-content-between ">
        <div class="card shadow mb-4">
            @if ($errors->any())
            <div class="alert alert-danger" id="verr">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card-body">
                <form method="POST" action="{{url('admin/menu/save-menu')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                            Name:
                        </div>
                        <div class="form-group col-md-7">
                            <input type="text" name="name" id="name" placeholder="Name" class="form-control"
                                value="{{ old('name') }}" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                            Parent:
                        </div>

                        <div class = "form-group col-md-7">
                            <select name="parent" class="form-control">
                                <option value="">Parent</option>
                                @foreach($menuItems as $menuItem)
                                <option value="{{ $menuItem->id }}">{{ $menuItem->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                            Link:
                        </div>
                        <div class="form-group col-md-7">
                            <input name="link" id="link" placeholder="Link" class="form-control ckeditort"
                                value="{{ old('link') }}">
                        </div>
                    </div>
					
					<div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                            Weight:
                        </div>
                        <div class="form-group col-md-7">
                            <input name="weight" id="weight" placeholder="Weight" class="form-control ckeditort"
                                value="{{ old('weight') }}" maxlength="2" oninput=" this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
						
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                            Description:
                        </div>
                        <div class="form-group col-md-7">
                            <textarea name="description" id="description" placeholder="Description"
                                class="form-control ckeditort">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    <div class="form-row form-feedback-button text-left">
                        <div class="form-group col-md-2">
                            &nbsp;
                        </div>
                        <div class="form-group col-md-7">
                            <button type="save" name="save" class="btn btn-primary py-2">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
