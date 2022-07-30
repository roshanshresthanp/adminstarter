<tbody class="tbody">
    @if (count($content) == 0)
        <tr>
            <td colspan="7">
                <p class="text-center">
                    No any records.
                </p>
            </td>
        </tr>
    @else
        @foreach ($content as $slider)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img src="{{$slider->image}}" alt="{{$slider->content_title}}" style="height: 100px; width: 150px;">
                </td>
                <td>{{$slider->content_title}}</td>
                <td>{{$slider->content_type}}</td>

                <td>
                    @if ($slider->publish_status == 1)
                       <span class="badge badge-success"> Active</span>
                    @else
                    <span class="badge badge-danger"> Inactive </span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('content.edit', $slider->id) }}" class="btn btn-primary" title="Edit"><i class="fas fa-edit"></i></a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletionservice{{ $slider->id }}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                    <!-- Modal -->
                        <div class="modal fade text-left" id="deletionservice{{ $slider->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <form action="{{ route('content.destroy', $slider->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method("POST")
                                            <label for="reason">Are you sure you want to delete??</label><br>
                                            <input type="hidden" name="_method" value="DELETE" />
                                            <button type="submit" class="btn btn-danger" title="Delete">Confirm Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        ";
                </td>
            </tr>
        @endforeach
    @endif
</tbody>
