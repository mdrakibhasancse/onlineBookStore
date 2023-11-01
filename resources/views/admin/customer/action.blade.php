<td>
    <form action="{{url("/admin/customers/$customer->id")}}"method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</td>
