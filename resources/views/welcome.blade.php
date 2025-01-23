@extends("layout.default")


@section("content")
<main class="flex-shrink-0 mt-5">
  @if(session()->has("success"))
  <div class="alert alert-primary alert-dismissible fade show" style="position: fixed; top: 40px; right: 50px; font-family: Poppins; color: #1C3FDC">
      {{session()->get("success")}}
  </div>
  <script>
    setTimeout(() => {
      let successAlert = document.querySelector('.alert-primary');
      if (successAlert) {
        successAlert.classList.remove('show');
        successAlert.classList.add('fade');
        setTimeout(() => successAlert.remove(), 150);
      }
    }, 5000);
  </script>
  @endif
  
  @if(session()->has("error"))
  <div class="alert alert-danger">
      {{session("error")}}
  </div>
  @endif
    <div class="container">
      <div class="mt-5 display-6" style="font-family: Poppins">Welcome {{auth()->user()->name}}!</div>
      <div class="my-3 p-3 bg-body rounded shadow-sm mt-5">
        <h6 class="border-bottom pb-2 mb-0 display-6" style="font-family: Poppins;">List of Tasks</h6>

        @foreach($tasks as $task)
        <div class="d-flex text-body-secondary pt-3">
          <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
            <div class="d-flex justify-content-between">
              <strong class="text-danger" style="font-size: large; font-family: Poppins;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5"/>
                </svg>{{$task->title}}
              </strong>
              <div>
                <a onclick="taskComplete(event, '{{route('task.status.update', $task->id)}}')" href="#" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square-fill" viewBox="0 0 16 16">
                  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm10.03 4.97a.75.75 0 0 1 .011 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.75.75 0 0 1 1.08-.022z"/>
                </svg></a>
                <a onclick="taskDelete(event, '{{route('task.status.delete', $task->id)}}')" href="#" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                </svg></a>
              </div>
            </div>
            <span class="d-block" style="font-family: Poppins;">{{$task->description}}</span>
            <p class="d-block" style="font-family: Poppins; margin-bottom: 5px; text-align: right;">{{$task->deadline}}</p>
          </div>
        </div>
        @endforeach
        <small class="d-block text-end mt-3">
          {{$tasks->links()}}
        </small>
      </div>
    </div>
  </main>


  <script>
    function taskComplete(event, updateUrl) {
    event.preventDefault(); // Prevents the default link action

    Swal.fire({
      title: "Are you sure you completed this task?",
      text: "This action can not be undone!",
      icon: "warning",
      iconColor: "#d33",
      showCancelButton: true,
      confirmButtonColor: "#1C3FDC",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, complete it!"
    }).then((result) => {
      if (result.isConfirmed) {  
        Swal.fire({
        title: "Task completed!",
        text: "Keep 'er goin'!",
        icon: "success",
        iconColor: "#1C3FDC"
      });

        setTimeout(() => {
          window.location.href = updateUrl;
        }, 2000);
      }
    });
  }


  function taskDelete(event, deleteUrl) {
    event.preventDefault(); // Prevents the default link action

    Swal.fire({
      title: "Are you sure you want to delete this task?",
      text: "This action can not be undone!",
      icon: "warning",
      iconColor: "#d33",
      showCancelButton: true,
      confirmButtonColor: "#1C3FDC",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {  
        Swal.fire({
        title: "Task deleted!",
        text: "Now what? Do another task!",
        icon: "success",
        iconColor: "#1C3FDC"
      });

        setTimeout(() => {
          window.location.href = deleteUrl;
        }, 2000);
      }
    });
  }
  </script>
@endsection