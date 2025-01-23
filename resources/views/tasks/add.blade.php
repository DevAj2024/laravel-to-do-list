@extends("layout.default-add")

@section("content")
<div class="d-flex align-items-center">
    <div class="container card shadow-sm" style="margin-top:100px; max-width: 500px">
        <div class="text-center mt-3 display-6">
            <h6 class="border-bottom pb-2 mb-0 display-6" style="font-family: Poppins;">Add New Task</h6>
        </div>
        <form action="{{route("task.add.post")}}"method="POST" class="p-3">
            @csrf
            <div class="mb-3">
                <input name="title" type="text" class="form-control" placeholder="Enter title...">
            </div>
            <div class="mb-3">
                <input type="datetime-local" name="deadline">
            </div>
            <div class="mb-3">
                <textarea name="description"class="form-control" rows="3" placeholder="Enter description..."></textarea>
            </div>
            @if(session()->has("success"))
            <div class="alert alert-success">
                {{session()->get("success")}}
            </div>
            @endif
            
            @if(session()->has("error"))
            <div class="alert alert-danger">
                {{session("error")}}
            </div>
            @endif
            <button class="btn btn-primary w-100 rounded-md" type="submit">Submit Task</button>
            <a class="btn btn-danger w-100 rounded-md mt-3"href="{{route("home")}}">Back</a>
        </form>
    </div>
</div>
@endsection