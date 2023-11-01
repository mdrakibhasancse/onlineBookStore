<td style="width: 150px;">
    @if($book->status==1)
        <a href="{{ route('books.show',$book->id) }}" onclick="return confirm('Are you sure change status?')" class="btn btn-success btn-sm">
            Active
        </a>
        @else
        <a href="{{ route('books.show',$book->id) }}" onclick="return confirm('Are you sure change status?')" class="btn btn-danger btn-sm">
            Inactive
       </a>
    @endif
</td>
