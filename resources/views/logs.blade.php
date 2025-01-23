@extends("layout.default")


@section("content")
<main class="flex-shrink-0 mt-5">
    <div class="container">
        <div class="mt-5 display-6" style="font-family: Poppins; text-align: center; margin-bottom: 30px;">Task Logs</div>
        <table class="table table-light table-hover"  style="font-family: Poppins;">
            <thead>
              <tr class="text-white">
                <th class="py-2 px-4">Id</th>
                <th class="py-2 px-4">Title</th>
                <th class="py-2 px-4">Description</th>
                <th class="py-2 px-4">Date</th>
                <th class="py-2 px-4">Status</th>
              </tr>
            </thead>
            @foreach($logs as $log)
            <tbody class="text-gray-700">
                <tr class="text-white">
                    <td class="py-2 px-4">{{$log->id}}</td>
                    <td class="py-2 px-4">{{$log->title}}</td>
                    <td class="py-2 px-4">{{$log->description}}</td>
                    <td class="py-2 px-4">{{$log->created_at}}</td>
                    <td class="py-2 px-4">
                        @if ($log->status=="Failed")
                            <span class="text-danger font-semibold">{{$log->status}}</span>
                            @elseif ($log->status == "Completed")
                            <span class="text-success font-semibold">{{ $log->status }}</span>
                        @else
                            <span class="text-dark">{{ $log->status }}</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
          {{$logs->links()}}

    </div>
</div>
  </main>

@endsection