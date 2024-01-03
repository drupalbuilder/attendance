@extends('admin.layouts.main')

@section('title', 'Update Menu')

@section('content')

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 w-600">Update Menu</h1>
    </div>

    <div class="card shadow mb-4">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        <div class="card-body">
            <form method="POST" action="{{ url('admin/menu/update') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $data->id }}">

                <div class="form-row">
                    <div class="form-group col-md-2 label-user-u">
                        Name:
                    </div>
                    <div class="form-group col-md-7">
                        <input type="text" name="name" id="name" placeholder="Name" class="form-control" value="{{ $data->name }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-2 label-user-u">
                        Parent
                    </div>
                    <div class="form-group col-md-7">
                        <select name="parent" class="form-control">
                            <option value="">Parent</option>
                            @foreach($menuItems as $menuItemId => $menuItemName)
                            <option  <?php if($data->parent == $menuItemId){ echo "selected==true"; } ?> value="{{ $menuItemId }}">{{ $menuItemName }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
								<div class="form-row">
								<div class="form-group col-md-2 label-user-u">
								Link:
								</div>
								<div class="form-group col-md-7">          
								 <input type="text" name="link" id="link" placeholder="Link" class="form-control" value="{{ $data->link }}" required>
								</div>
								</div>
								<div class="form-row">
                        <div class="form-group col-md-2 label-user-u">
                            Weight:
                        </div>
                        <div class="form-group col-md-7">
                            <input name="weight" id="weight" placeholder="Weight only in numbers" class="form-control ckeditort"
                                value="{{ $data->weight }}" maxlength="2" oninput=" this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
						 
						
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-2 label-user-u">
                        Description:
                    </div>
                    <div class="form-group col-md-7">          
						<textarea name="description" id="editor" rows="10" id="description" placeholder="Description" class="form-control ckeditort">{{ $data->description }}</textarea>
                    </div>
                </div>

                

                <div class="form-row form-feedback-button text-left">
                    <div class="form-group col-md-2">
                        &nbsp;
                    </div>
                    <div class="form-group col-md-7">
                        <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> 
@endsection
