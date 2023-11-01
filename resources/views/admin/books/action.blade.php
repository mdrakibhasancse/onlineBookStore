<td>
    <div class="btn-style d-flex">
        <div class="edit-btn mr-1">
            <a class="btn btn-warning" href="{{ route('books.edit',$book->id) }}">Edit</a>
        </div>
        <div class="delete-btn">
            <form action="{{ route('books.destroy',$book->id)}}" method="post" onclick="return confirm('Are you sure you want to delete this item?');">
                @csrf
                @method('delete')
                 <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</td>
