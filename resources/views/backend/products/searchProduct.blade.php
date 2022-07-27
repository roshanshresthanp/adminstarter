<tbody id="tableReplace">
    @if (count($products) == 0)
        <tr>
            <td colspan="5">
                <p class="text-center">
                    No any records.
                </p>
            </td>
        </tr>
    @else
        @foreach ($products as $product)
            <tr>
                    <td>
                        <img src="{{ Storage::disk('uploads')->url($product->featured_img) }}" alt="{{ $product->title }}" style="height: 90px; width: 150px;">
                    </td>
                <td>
                    {{ $product->title }}
                </td>
                <td>
                    {{ $product->category->title }}
                </td>
                {{-- <td>
                    {{ $product->series->model_name }}
                </td> --}}
                <td>
                    Rs. {{ $product->price }}
                </td>

                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary" title="Edit"><i class="fas fa-edit"></i></a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletionservice{{ $product->id }}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></button>
                    <!-- Modal -->
                        <div class="modal fade text-left" id="deletionservice{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
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